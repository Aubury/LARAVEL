<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ImageInt;
use Illuminate\Support\Str;

class ImageController extends Controller
{

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
                $img = ImageInt::make($f);
                $img->save($path . $fileName);
                Image::create(['title' => $request->title, 'img' => $fileName]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
