<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ImageInt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem as File;
use function Ramsey\Uuid\v1;

class ImageController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        $images = Image::all();
        return view('images.images',['images' => $images]);
    }

    public function create(){
        return view('images.create');
    }

    public function store(Request $request)
    {
        if(!$this->files_uploaded()) { // Проверяем, загрузил ли пользователь файл
            return redirect()->back();

        }else{
            $path = public_path() . '\upload\\';
            $file = $request->file('file');

            foreach ($file as $f) {

                $obj = DB::table('images')->where('img', $f->getClientOriginalName())->first();
                $mass = (array)$obj;

                if (!$mass) {

                    $fileName = $f->getClientOriginalName(); //Get Image Name

                } else {
                    $extension = $f->getClientOriginalExtension();  //Get Image Extension
                    $pos = strpos($f->getClientOriginalName(), ".");
                    $fn = substr($f->getClientOriginalName(), 0, $pos);
                    $fileName = $fn . '_' . mt_rand(0, 100) . '.' . $extension;  //Concatenate both to get FileName (eg: file.jpg)
                }
                $size_img = $f->getSize();
                $image_info = getimagesize($f);
                $width = $image_info[0];
                $height = $image_info[1];
                $img = ImageInt::make($f);
                $img->save($path . $fileName);
                Image::create([
                    'title' => $fileName,
                    'img'   => $fileName,
                    'width' => $width,
                    'height'=> $height,
                    'size'  => $size_img,
                    'ipAddress'=> $request->ip() || $this->getIp() || '127.0.0.1:8000'
                ]);
            }

            return redirect()->route('images');
        }
    }
    /**
     * Tests all upload fields to determine whether any files were submitted.
     *
     * @return boolean
     */
    function files_uploaded() {

        // bail if there were no upload forms
        if(empty($_FILES))
            return false;

        // check for uploaded files
        $files = $_FILES['file']['tmp_name'];
        foreach( $files as $field_title => $temp_name ){
            if( !empty($temp_name) && is_uploaded_file( $temp_name )){
                // found one!
                return true;
            }
        }
        // return false if no files were found
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
//        $prp = new Image();
        $img = Image::find($id);
        return view('images.image', ['image'=>$img]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
      //
    }

    /**
    * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $image
     * @return \Illuminate\Http\RedirectResponse
   */
    public function updateImage(Request $image)
    {
        $id = $image->get('id');
        $name = $image->get('name');
        $width = intval($image->input('width'));
        $height = intval($image->input('height'));
        $x = intval($image->input('x'));
        $y = intval($image->input('y'));
        $path = public_path() . '\upload\\';

        $model = new Image();
        $model->resizeImage($id, $width, $height);


        ImageInt::make($path . $name)
//            ->resize($width,$height)
                ->crop($width,$height, $x, $y)
            ->save($path . $name);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $img)
    {
       app(File::class)->delete((public_path('upload/'.$img->name)));//удаление из папки
       Image::destroy($img->id); //удаление из базы
       return redirect()->back();
    }
    public function getIp(){
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            {
                $ip_addr = $_SERVER["HTTP_X_FORWARDED_FOR"];
            }
            elseif (isset($_SERVER["HTTP_CLIENT_IP"]))
            {
                $ip_addr = $_SERVER["HTTP_CLIENT_IP"];
            }
            else
            {
                $ip_addr = $_SERVER["REMOTE_ADDR"];
            }
        }
        else
        {
            if ( getenv( 'HTTP_X_FORWARDED_FOR' ) )
            {
                $ip_addr = getenv( 'HTTP_X_FORWARDED_FOR' );
            }
            elseif ( getenv( 'HTTP_CLIENT_IP' ) )
            {
                $ip_addr = getenv( 'HTTP_CLIENT_IP' );
            }
            else
            {
                $ip_addr = getenv( 'REMOTE_ADDR' );
            }
        }
        return $ip_addr;
    }
}
