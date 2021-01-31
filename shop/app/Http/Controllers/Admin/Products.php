<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
//use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Admin\Products as Product;
use App\Models\Admin\Categories as Category;
use App\Models\Admin\Brands as Brand;
use Illuminate\Support\Facades\DB;
use Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as ImageInt;
use App\Http\Controllers\ImageController as ImageStore;

use Illuminate\Http\Response;
//use Symfony\Component\HttpFoundation\Response;

//use Illuminate\Http\UploadedFile;
//use Illuminate\Filesystem\Filesystem as File;
use Illuminate\Support\Str;
//use Illuminate\Support\Facades\Storage;
//use Symfony\Component\Console\Input\Input;
//use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\UploadedFile;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;


use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class Products extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function show(){
        return view('products.products', ['products' => $this->all_products()]);
    }
    public function create(){
        return view('products.create',
            ['categories' => $this->all_categories(),
             'brands' => $this->all_brands(),
            ]);
    }
    /**
     * Handle a login request to the application.
     *
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addProduct(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => ['required','string','min:2', 'unique:products'],
            'category' => ['required'],
            'brand'  => ['required'],
        ], $this->messages());


       if($validator->fails()) {
           return redirect()->back()
                   ->withErrors($validator)->withInput($request->all());

       }else{

//           dd($request);

           $product = new Product();
           $product->name = $request->input('name');
           $product->category = $request->input('category');
           $product->brand = $request->input('brand');
           $product->main_img = $request->input('main_img');
           $product->mass_img = $request->input('mass_img');
           $product->short_description = $request->input('short_description');
           $product->full_description = $request->input('full_description');
           $product->price = $request->input('price');
           $product->amount = $request->input('amount');
           $product->save();

          return redirect(route('products'));
       }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function edit($id){
        $product = new Product();
        return view('products.edit',
            ['product' => $product->get_product($id),
             'categories' => $this->all_categories(),
              'brands' => $this->all_brands(),]);
    }

    public function edit_product(Request $request){

        $main_img = null;
        $mass_img = [];
        $store = new ImageStore();
        $product = new Product();

        $img = $request->file('file');

        $prd =  $product->get_product($request->input('id'));

        $prd->main_img === Input::file('main_img') ?
            $main_img = $prd->main_img : $main_img = $this->store_img(Input::file('main_img'));

        $prd->mass_img === Input::file('mass_img') ?
            $mass_img = $prd->mass_img : $mass_img = $this->store_img(Input::file('mass-img'));


        $product->where('id', $request->input('id'))
                ->update([ 'name'     => $request->input('name'),
                           'category' => $request->input('category'),
                           'brand'    => $request->input('brand'),
                           'main_img' => $main_img,
                           'mass_img' => $mass_img,
                           'short_description' => $request->input('short_description'),
                           'full_description' => $request->input('full_description'),
                           'price'    => $request->input('price'),
                           'amount' => $request->input('amount')]);

        return redirect(route('products'));
    }
    public function store_img(Request $request)
    {
        $mass_img = [];

        if($request->hasFile('file')) { // Проверяем, загрузил ли пользователь файл

            $path = public_path() . '\upload\\';
            $file = $request->file('file');


            foreach ($file as $f) {

                $obj = DB::table('images')->where('img', $f->getClientOriginalName())->first();

                if (!$obj) {
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
                $info = ['name' => $fileName, 'size' => $size_img, 'info' => $image_info, 'width' => $width, 'height' => $height];

                ImageInt::make($f)->save($path . $fileName);

                $id = DB::table('images')
                    ->insertGetId(array( 'title' => $fileName,
                                        'img'   => $fileName,
                                        'width' => $width,
                                        'height'=> $height,
                                        'size'  => $size_img,
                                        'created_at' => now(),
                                        'updated_at' => now()));

                array_push($mass_img,
                    array('id' => $id,
                        'name' => $this->get_img_name($id),
                        'url' => asset('upload/'.$fileName)));

            }

//            $data = json_encode($mass_img);
//            return response()->json(array('images'=>$data), 200)->header('Content-Type', 'application/json');
              return $mass_img;

        }else{
            return redirect()->back()->withErrors('No file');
        }
    }

    public function store_img_with_js(Request $request)
    {
        $files = $request->file('files');
        $path = public_path() . '\upload\\';
        $mass_img = [];


        foreach ($files as $file){
            $obj = DB::table('images')->where('img', $file->getClientOriginalName())->first();
            $mass = (array)$obj;

            if (!$mass) {
                $fileName = $file->getClientOriginalName(); //Get Image Name
            } else {
                $extension = $file->getClientOriginalExtension();  //Get Image Extension
                $pos = strpos($file->getClientOriginalName(), ".");
                $fn = substr($file->getClientOriginalName(), 0, $pos);
                $fileName = $fn . '_' . mt_rand(0, 100) . '.' . $extension;  //Concatenate both to get FileName (eg: file.jpg)
            }
            $size_img = $file->getSize();
            $image_info = getimagesize($file);
            $width = $image_info[0];
            $height = $image_info[1];
            $info = ['name' => $fileName, 'size' => $size_img, 'info' => $image_info, 'width' => $width, 'height' => $height];

            $img = ImageInt::make($file);
            $img->save($path . $fileName);

            $id = DB::table('images')
                ->insertGetId(array( 'title' => $fileName,
                    'img'   => $fileName,
                    'width' => $width,
                    'height'=> $height,
                    'size'  => $size_img,
                    'created_at' => now(),
                    'updated_at' => now()));

          array_push($mass_img,
              array('id' => $id,
                    'name' => $this->get_img_name($id),
                    'url' => asset('upload/'.$fileName)));
        }
       return $mass_img;

    }
    function get_img_name($id){

        $img = DB::table('images')->where('id', $id)->first();
        return $img->img;
    }


    /**
     * Tests all upload fields to determine whether any files were submitted.
     *
     * @param $name
     * @return boolean
     */
    function files_uploaded() {

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
    function normalizeFiles( &$files )
    {
        $_files       = [ ];
        $_files_count = count( $files[ 'name' ] );
        $_files_keys  = array_keys( $files );

        for ( $i = 0; $i < $_files_count; $i++ )
            foreach ( $_files_keys as $key )
                $_files[ $i ][ $key ] = $files[ $key ][ $i ];

        return $_files;
    }
    function Can_upload($files){

        $info = [];
        foreach ($files as $file){
            // если имя пустое, значит файл не выбран
            if($file['name'] == ''){
                $info = array('Вы не выбрали файл.');
            }
            /* если размер файла 0, значит его не пропустили настройки
            сервера из-за того, что он слишком большой */
            if($file['size'] == 0){
                $info = array('Файл слишком большой.');
            }
            // разбиваем имя файла по точке и получаем массив
            $getMime = explode('.', $file['name']);
            // нас интересует последний элемент массива - расширение
            $mime = strtolower(end($getMime));
            // объявим массив допустимых расширений
            $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

            // если расширение не входит в список допустимых - return
            if(!in_array($mime, $types)){
                $info = array('Недопустимый тип файла.');

            }
            return $info;
        }
        return true;
    }

    /**
     * @param string $category
     */
    public function get_category($category){
        //-----
    }
    public function all_products(){
        $products = new Product();
        return $products->all_products();
    }
    public function all_categories(){
        $categories = new Category();
        return $categories->all_categories();
    }
    /**
     * @param string $brand
     */
    public function get_brand($brand){

    }
    public function all_brands(){
        $brands = new Brand();
        return $brands->all_brands();
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->rules(), $this->messages());
    }
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|unique:products',
            'category' => 'required',
            'brand'  => 'required',

        ];
    }
    public function messages(){
        return [
            'name.unique'  => 'Такое название уже существует',
            'name.required'  => 'Имя является обязательным для заполнения',
            'name.min' => 'Название должно состоять из минимум 2 символов',
            'category.required' => 'Сделайте выбор категории',
            'brand.required' => 'Сделайте выбор бренда'
        ];
    }

}
