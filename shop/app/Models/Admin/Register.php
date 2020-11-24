<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Register extends Model
{
    use HasFactory;
    public $table = 'admins';

    public function getAdmins(){
        $data = DB::table('admins')->get();
        $admin = [];
        foreach ($data as $value){
            array_push($admin,[
                'id'         => $value->id,
                'name'       => $value->name,
                'patronymic' => $value->patronymic,
                'surname'    => $value->surname,
                'phone'      => $value->phone,
                'email'      => $value->email,
                'last_visit' => $value->last_visit,
            ]);
        }

        return $admin;
    }
    public function updateDataAdmin($arr)
    {
        DB::table('admins')
            ->where('id', $arr->id)
            ->update(['name' => $arr['name'],
                'patronymic' => $arr['patronymic'],
                'surname' => $arr['surname'],
                'phone' => $arr['phone'],
                'email' => $arr['email'],
            ]);
    }
}
