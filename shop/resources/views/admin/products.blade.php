@extends('layouts.adminApp')
@section('title-page')Категории@endsection
@section('navigation')
    <nav class="container navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin')}}">Жалобы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adminRegister')}}">Администраторы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories')}}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('brands')}}">Бренды</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('products')}}">Товары</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('images')}}">Картинки</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div class="f-row justify-center">
        <h2>Продукты</h2>
    </div>
    <div class="f-row container">
        <div class="col-4 col-md-3 offset-md-9 p-2">
            <input onkeyup="tableSearch()" class="form-control mr-sm-3" id="searchProducts" type="search" placeholder="Поиск по таблице" aria-label="Search">
        </div>
    </div>
    <div class="f-row justify-around container">
        <div class="col-12 border-warning">
            <table class="tableAdmins w_100" id="tableProducts">
                <tr><th>Delete</th><th>Edit</th><th>Название</th></tr>
{{--                @foreach($products as $product)--}}
{{--                    <tr><td class="iconsDel"><i class="material-icons" onclick="fillInputsForm({{json_encode($product)}},'formDeleteBrand' )">delete</i></td>--}}
{{--                        <td class="iconsEd"><i class="material-icons" onclick="fillInputsForm({{json_encode($product)}}, 'formEditBrand')">edit</i></td>--}}
{{--                        <td>{{$product->name}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
            </table>
        </div>
    </div>
@endsection

@section('scripts')


@endsection


