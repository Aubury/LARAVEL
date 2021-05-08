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
    <div class="f-row container justify-between">
        <a href="{{route('createProduct')}}" class="btn btn-primary f-row align-center"><i class="material-icons">add</i><span class="p-1">Создать</span></a>
        <div class="col-4 col-md-3 p-2">
            <input onkeyup="tableSearch()" class="form-control mr-sm-3" id="searchProducts" type="search" placeholder="Поиск по таблице" aria-label="Search">
        </div>
    </div>
    <div class="f-row justify-around container">
        <div class="border-warning w-100">
            <table class="tableAdmins w_100" id="tableProducts">
                <tr><th>Delete</th><th>Edit</th><th>ID</th><th>Картинка</th><th>Категория</th><th>Бренд</th><th>Название</th><th>Цена</th><th>Количество</th></tr>
                @foreach($products as $product)
                    <tr><td class="iconsDel">
                            <form method="POST" action="#">
                                @csrf
                                <input type="hidden" name="id" value="{{$product['id']}}">
                                <button type="submit" class="no-border"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                        <td class="iconsEd">
                            <form method="get" action="{{route('get_product_for_edit', $product['id'])}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$product['id']}}">
                                <button type="submit" class="no-border"><i class="material-icons">edit</i></button>
                            </form>
                        </td><td>{{ $product['id'] }}</td>
                        <td>
                            @if($product['main_img'] != 'No image!')
                                <img src="{{ asset('upload/'.$product['main_img']) }}">
                                @else
                                <span>No picture</span>
                            @endif
                        </td>
                        <td>{{$product['category']}}</td>
                        <td>{{$product['brand']}}</td>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['price']}}</td>
                        <td>{{$product['amount']}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@section('scripts')


@endsection


