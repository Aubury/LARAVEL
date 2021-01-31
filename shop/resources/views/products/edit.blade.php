@extends('layouts.adminApp')
@section('title-page')Создать товар@endsection
@section('style')
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

@endsection
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
                    <a class="nav-link" href="{{route('products')}}">Товары</a>
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
        <h2>Создать продукт</h2>
    </div>
    <div class="f-row justify-around container">
        <div class="border-info w_100">
            <form action="{{route('edit_product')}}" method="post">
                @csrf
                <input type="text" name="id" id="id" value="{{$product->id}}" hidden>
                <p class="pb-3">
                    <label for="name">Назание товара</label>
                    <input type="text" name="name" id="name" class="_form-control no_margin_top @error('name') is-invalid @enderror" value="{{$product->name}}">
                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </p>
                <p class="pb-3">
                    <label for="category">Категория товара</label>
                    <select  name="category" id="category" class="_form-control no_margin_top @error('category') is-invalid @enderror" value="{{$product->category}}">
                        @foreach($categories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </p>
                <p class="pb-3">
                    <label for="brand">Бренд товара</label>
                    <select  name="brand" id="brand" class="_form-control no_margin_top @error('brand') is-invalid @enderror" value="{{$product->brand}}">
                        @foreach($brands as $brand)
                            <option value="{{$brand->name}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </p>
                <p class="pb-3">
                    <label for="price">Цена товара</label>
                    <input type="number" name="price" id="price" class="_form-control no_margin_top" value="{{$product->price}}">
                </p>
                <p class="pb-3">
                    <label for="amount">Количество товара</label>
                    <input type="number" name="amount" id="amount" class="_form-control no_margin_top" value="{{$product->amount}}">
                </p>
                <p class="pb-3">
                    <label for="short_description">Короткое описание</label>
                    <textarea id="short_description" name="short_description" class="_form-control no_margin_top" value="{{$product->short_description}}"></textarea>
                </p>
                <p class="pb-3">
                    <label for="full_description">Полное описание</label>
                    <textarea id="full_description" name="full_description" class="_form-control no_margin_top" value="{{$product->full_description}}"></textarea>
                </p>
                <div class="pb-3">
                    <div class="f-col">
                        <label for="main_photo">Главное изображение</label>
                        <input type="file" name="main_img" id="main_img" placeholder="Загрузите изображение" value="{{$product->main_img}}" enctype="multiform/form-data">
                        <div class="f-row">
                            @if(!empty($product->main_img))
                            <img src="{{ asset('upload/'.$product->main_img) }}" class="min_photo">
                            @endif
                        </div>
                    </div>
                    {{--                    <div class="file-field input-field no_margin_top">--}}
                    {{--                        <div class="btn">--}}
                    {{--                            <span>File</span>--}}
                    {{--                            <input id="main_photo" type="file" name="main_photo">--}}
                    {{--                        </div>--}}
                    {{--                        <div class="file-path-wrapper">--}}
                    {{--                            <input class="file-path validate" type="text" placeholder="Загрузите изображение">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
                <div class="pb-3 f-col">
                    <label for="mass_img">Дополнительные изображения</label>
                    <input id="mass_img" type="file" name="mass_img[]" placeholder="Загрузите изображение" value="{{$product->mass_img}}" enctype="multiform/form-data">
                </div>
                <p><button class="btn btn-block btn-success" type="submit">Изменить</button></p>
            </form>
        </div>
        {{--        <div class="card border-info  mb-3">--}}
        {{--            <div class="card-header"><h5>Главное изображения</h5></div>--}}
        {{--            <div class="card-body">--}}
        {{--                <form action="#" method="post"  name="main_photo">--}}
        {{--                    @csrf--}}
        {{--                    <p><input type="hidden" name="id" value="" class="form-control no_margin_top"></p>--}}
        {{--                    <p><input type="hidden" name="name" value="" class="form-control no_margin_top"></p>--}}
        {{--                    <div class="file-field input-field">--}}
        {{--                        <div class="btn">--}}
        {{--                            <span>File</span>--}}
        {{--                            <input id="img" type="file" name="file[]">--}}
        {{--                        </div>--}}
        {{--                        <div class="file-path-wrapper">--}}
        {{--                            <input class="file-path validate" type="text" placeholder="Upload one or more files">--}}
        {{--                        </div>--}}
        {{--                        <button type="submit" class="btn btn-success">Добавить</button>--}}
        {{--                    </div>--}}
        {{--                </form>--}}
        {{--                <span><img src="{{ asset('upload/'.$product->main_img) }}" alt="Главное изображение"></span>--}}
        {{--            </div>--}}
        {{--        </div>--}}


    </div>
@endsection

@section('scripts')

@endsection


