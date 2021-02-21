<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\Image as Image;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category',
        'brand',
        'main_img',
        'mass_img',
        'short_description',
        'full_description',
        'price',
        'amount',
        ];
    public function all_products(){

        // create a log channel
        $log = new Logger('All_Products');
        $log->pushHandler(new StreamHandler('my_storage/products.log', Logger::WARNING));

        $products = [];
        $mass = DB::table($this->table)->get();

        $log->warning($mass);

        foreach ($mass as $value){
            $mass_img_name = [];
            if($value->mass_img){
                $arr = explode(",", $value->mass_img);
                foreach ($arr as $item=>$id){
                    array_push($mass_img_name, $this->get_photo_name($id));
                    $log->warning($id);

                }
            }



            array_push($products,
                array('id'        => $value->id,
                       'name'     => $value->name,
                       'category' => $value->category,
                       'brand'    => $value->brand,
                       'main_img' => $this->get_photo_name($value->main_img),
                       'mass_img' => (!$value->mass_img) ? $mass_img_name : $value->mass_img,
                       'short_description'=> $this->short_description,
                       'full_description' => $this->full_description,
                       'price'    => $value->price,
                       'amount'   => $value->amount
                ));
        }
        $log->warning(json_encode( $products));

        return $products;
    }
    function cvf_convert_object_to_array($data) {

        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        if (is_array($data)) {
            return array_map(__FUNCTION__, $data);
        }
        else {
            return $data;
        }
    }
    public function get_photo_name($id){
        // create a log channel
        $log = new Logger('All_Products');
        $log->pushHandler(new StreamHandler('my_storage/products.log', Logger::WARNING));
        $log->warning(json_encode( $id));
       if($id){
           $photo = DB::table('images')->where('id', $id)->first();
           return $photo->title;
       }else{
           return 'No image!';
       }

    }
    public function get_product($id){

        $value = DB::table($this->table)->where('id' , $id)->first();
        $product = [];

        $mass_img_name = [];

        if($value->mass_img){
            $arr = explode(",", $value->mass_img);
            foreach ($arr as $item=>$id){
                array_push($mass_img_name, $this->get_photo_name($id));
            }
        }


        array_push($product,
            array('id'      => $value->id,
                'name'      => $value->name,
                'category'  => $value->category,
                'brand'     => $value->brand,
                'id_main_img' => $value->main_img,
                'main_img'    => $this->get_photo_name($value->main_img),
                'id_mass_img' => $value->mass_img,
                'mass_img' => (!$value->mass_img) ? $mass_img_name : $value->mass_img,
                'short_description'=> $value->short_description,
                'full_description' => $value->full_description,
                'price'    => $value->price,
                'amount'   => $value->amount
            ));

        return $product;
    }
}
