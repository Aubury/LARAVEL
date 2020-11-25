<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Caterories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Categories extends Controller
{
    /**
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::CATEGORIES;

    public function __construct(){
        $this->middleware('admin');
    }
    public function show(){
        $categories = DB::table('categories')->get();
        return view('admin.categories', ['categories'=>$categories]);
    }
    public function register(Request $data){

//        $prp = DB::table('categories')->where('name', $data->input('name'));
        $validator = Validator::make($data->all(), [
            'name' => ['required', 'string', 'min:2', 'max:255', 'unique:categories'],
        ], $this->messages());

        $categories = new Caterories();
        $categories->name = $data->input('name');

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data->all());
        } else {
            $categories->save();
            return redirect()->back();
        }

    }
    public function edit(Request $data){
        DB::table('categories')
            ->where('id', $data->id)
            ->update([
                'name' => $data['name'],
            ]);
        return redirect()->back();

    }
    public function delete(Request $data){

        DB::table('categories')->delete($data->id);
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
