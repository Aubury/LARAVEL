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
                    <a class="nav-link active" href="{{route('brands')}}">Бренды</a>
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

    </div>
@endsection

@section('scripts')
    <script src="https://kit.fontawesome.com/6c7f1b339a.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('js/main_page.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>

@endsection


