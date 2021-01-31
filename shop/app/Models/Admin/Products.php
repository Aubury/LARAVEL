<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\Image as Image;

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

        $products = [];
        $mass = DB::table($this->table)->get();

        foreach ($mass as $value){
            $json_img = (array)$value['mass_img'];
            $mass_img_name = [];
            foreach ($json_img as $name){
                array_push($mass_img_name, $this->get_photo_name($name));
            }

            array_push($products,
                array('id'        => $value['id'],
                       'name'     => $value['name'],
                       'category' => $value['category'],
                       'brand'    => $value['brand'],
                       'main_img' => $this->get_photo_name($value['id']),
                       'mass_img' => $mass_img_name,
                       'short_description'=> $this['short_description'],
                       'full_description' => $this['full_description'],
                       'price'    => $value['price'],
                       'amount'   => $value['amount']
                ));
        }


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
        $photo = DB::table('images')->where('id', $id)->first();
        return $photo->name;
    }
    public function get_product($id){
        return DB::table($this->table)->where('id' , $id)->first();
    }
}
