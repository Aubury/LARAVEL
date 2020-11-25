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
            <input onkeyup="tableSearch()" class="form-control mr-sm-3" id="searchBrands" type="search" placeholder="Поиск по таблице" aria-label="Search">
        </div>
    </div>
    <div class="f-row justify-around container">
        <div class="col-3">
            <div class="widget">
                <h3>МЕНЮ</h3>
                <ul>
                    <li><a href="#" onclick="showForm('addBrand')">Добавить категорию</a></li>
                    <li><a href="#" onclick="showForm('editBrand')">Редактировать категорию</a></li>
                    <li><a href="#" onclick="showForm('deleteBrand')">Удалить категорию</a></li>
                </ul>
            </div>
            <div class="block-form card border-info  mb-3" id="addBrand">
                <div class="card-header"><h5>Добавление бренд</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('registerBrand') }}" class="relative" id="formAddBrand" name="formAddBrand">
                        @csrf
                        <div class="col w-100">

                            <p><input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Имя" value="{!! old('name') !!}" required>
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="submit"  value="Регистрация" class="btn btn-primary form-control"></p>
                        </div>

                    </form>
                </div>
            </div>
            <div class="block-form card border-info  mb-3" id="editBrand">
                <div class="card-header"><h5>Редактировать бренд</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('editBrand') }}" class="relative" id="formEditBrand" name="formEditBrand">
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
            <div class="block-form card border-info  mb-3" id="deleteBrand">
                <div class="card-header"><h5>Удалить бренд</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('deleteBrand') }}" class="relative" id="formDeleteBrand" name="formDeleteBrand">
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
            <table class="tableAdmins w_100" id="tableBrand">
                <tr><th>Delete</th><th>Edit</th><th>Название</th></tr>
                @foreach($brands as $brand)
                    <tr><td class="iconsDel"><i class="material-icons" onclick="fillInputsForm({{json_encode($brand)}},'formDeleteBrand' )">delete</i></td>
                        <td class="iconsEd"><i class="material-icons" onclick="fillInputsForm({{json_encode($brand)}}, 'formEditBrand')">edit</i></td>
                        <td>{{$brand->name}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://kit.fontawesome.com/6c7f1b339a.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('js/main_page.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>

    <script>
        let brands = '@json($brands)';
        getAllMass(brands);
    </script>

@endsection

