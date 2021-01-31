<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Categories;
use App\Models\Admin\Brands as Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Brands extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function show(){
        $brands = DB::table('brands')->get();
        return view('admin.brands', ['brands'=>$brands]);
    }
    public function register(Request $data){

        $validator = Validator::make($data->all(), [
            'name' => ['required', 'string', 'min:2', 'max:255', 'unique:categories'],
        ], $this->messages());

        $brand = new Brand();
        $brand->name = $data->input('name');

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data->all());
        } else {
            $brand->save();
            return redirect()->back();
        }

    }
    public function edit(Request $data){
        DB::table('brands')
            ->where('id', $data->id)
            ->update([
                'name' => $data['name'],
            ]);
        return redirect()->back();

    }
    public function delete(Request $data){

        DB::table('brands')->delete($data->id);
        return redirect()->back();
    }
    public function messages()
    {
        return [
            'name.required' => 'Название является обязательным для заполнения',
            'name.unique' => 'Такое название уже есть',
            'name.min' => 'Не менее 2 букв',
        ];
    }
}
