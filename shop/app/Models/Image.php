<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'title',
        'img',
        'width',
        'height',
        'size',
    ];
    public function getImage($id){

        return DB::table($this->table)->where('id', $id)->first();

    }
    public function resizeImage($id, $width, $height, $size){
        DB::table('images')
            ->where('id', $id)
            ->update([
                'width' => $width,
                'height' => $height,
                'size' => $size,
                'updated_at' => now(),
            ]);
    }

}
