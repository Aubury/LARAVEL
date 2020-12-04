@extends('layouts.adminApp')
@section('style')
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
@endsection
@section('title-page')Изображения@endsection
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
                    <a class="nav-link active" href="{{route('images')}}">Картинки</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div class="f-row justify-center">
        <h2>Каталог изображения</h2>
    </div>
    <div class="f-row container">
        <div class="col-4 col-md-3 offset-md-9 p-2">
            <input onkeyup="tableSearch()" class="form-control mr-sm-3" id="searchImages" type="search" placeholder="Поиск по таблице" aria-label="Search">
        </div>
    </div>
    <div class="f-row justify-around container">
        <div class="col-4">
            <div class="card border-info  mb-3">
                <div class="card-header"><h5>Добавление изображение</h5></div>
                <div class="card-body">
                    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input id="img" type="file" name="file[]" multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div>
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8 border-warning">
            <table class="tableImages w_100" id="tableImages">
                <tr><th>Delete</th><th>Edit</th><th>ID</th><th>Картинка</th><th>Название</th></tr>
                @foreach($images as $image)
                    <tr><td class="iconsDel">
                            <form method="POST" action="{{route('deleteImage')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$image->id}}">
                                <input type="hidden" name="name" value="{{$image->img}}">
                                <button type="submit" class="no-border"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                        <td class="iconsEd">
                            <a href="{{route('image',$image)}}">
                                <i class="material-icons">edit</i>
                             </a>
                         </td>
                        <td>{{ $image->id }}</td>
                        <td><img src="{{ asset('upload/'.$image->img) }}"> </td>
                        <td>{{ $image->title }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
@endsection

@section('scripts')

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

@endsection



