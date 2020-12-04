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
                    <a class="nav-link active" href="{{route('categories')}}">Категории</a>
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
        <h2>Категории</h2>
    </div>
    <div class="f-row container">
        <div class="col-4 col-md-3 offset-md-9 p-2">
            <input onkeyup="tableSearch()" class="form-control mr-sm-3" id="searchCategories" type="search" placeholder="Поиск по таблице" aria-label="Search">
        </div>
    </div>
    <div class="f-row justify-around container">
        <div class="col-3">
            <div class="widget">
                <h3>МЕНЮ</h3>
                <ul>
                    <li><a href="#" onclick="showForm('addCategory')">Добавить категорию</a></li>
                    <li><a href="#" onclick="showForm('editCategory')">Редактировать категорию</a></li>
                    <li><a href="#" onclick="showForm('deleteCategory')">Удалить категорию</a></li>
                </ul>
            </div>
            <div class="block-form card border-info  mb-3" id="addCategory">
                <div class="card-header"><h5>Добавление категорию</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('registerCategory') }}" class="relative" id="formAddCategory" name="formAddCategory">
                        @csrf
                        <div class="col w-100">

                            <p><input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Имя" value="{!! old('name') !!}" required>
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                           <p><input type="submit"  value="Регистрация" class="btn btn-primary form-control"></p>
                        </div>

                    </form>
                </div>
            </div>
            <div class="block-form card border-info  mb-3" id="editCategory">
                <div class="card-header"><h5>Редактировать категорию</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('editCategory') }}" class="relative" id="formEditCategory" name="formEditCategory">
                        @csrf
                        <div class="col w-100">
                            <p><input type="text" class="form-control @error('id') is-invalid @enderror" name="id" placeholder="Id" value="{!! old('id') !!}" readonly>
                                @error('id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Имя" value="{!! old('name') !!}" required>
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="submit"  value="Изменить" class="btn btn-primary form-control"></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="block-form card border-info  mb-3" id="deleteCategory">
                <div class="card-header"><h5>Удалить категорию</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('deleteCategory') }}" class="relative" id="formDeleteCategory" name="formDeleteCategory">
                        @csrf
                        <div class="col w-100">
                            <p><input type="text" class="form-control @error('id') is-invalid @enderror" name="id" placeholder="Id" value="{!! old('id') !!}" readonly>
                                @error('id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Имя" value="{!! old('name') !!}" required>
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="submit"  value="Удалить" class="btn btn-primary form-control"></p>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-9 border-warning">
            <table class="tableCategories w_100" id="tableCategories">
                <tr><th>Delete</th><th>Edit</th><th>Название</th></tr>
                    @foreach($categories as $category)
                    <tr><td class="iconsDel"><i class="material-icons" onclick="fillInputsForm({{json_encode($category)}},'formDeleteCategory' )">delete</i></td>
                        <td class="iconsEd"><i class="material-icons" onclick="fillInputsForm({{json_encode($category)}}, 'formEditCategory')">edit</i></td>
                        <td>{{$category->name}}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection

@section('scripts')
{{--    <script type="text/javascript" src="{{asset('js/main_page.js')}}"></script>--}}
    <script>
        let categories = '@json($categories)';
        getAllMass(categories);
    </script>

@endsection
