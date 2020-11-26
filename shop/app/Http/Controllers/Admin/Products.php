<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Products extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function show(){
        return view('admin.products');
    }
    public function pageAddProduct(){
        return view('admin.addProduct');
    }
}
