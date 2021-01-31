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
        <div class="col-4">
            {{----------  Главное изображение -----------}}
            <div class="card border-info  mb-3">
                <div class="card-header"><h5>Главное изображения</h5></div>
                <div class="card-body">
                    <!--Our component:-->
                    <add_main_image_form></add_main_image_form>
                </div>
            </div>
            <div class="card border-info  mb-3">
                <div class="card-header"><h5>Дополнительные изображения</h5></div>
                <div class="card-body">
                    <!--Our component:-->
                    <add_array_images_form></add_array_images_form>
                </div>
            </div>

        </div>
        <div class="col-8 border-warning">
            <form action="{{route('add_product')}}" method="post">
                @csrf
                <p class="w_100 pb-3 ">
                    <label for="name">Назание товара</label>
                    <input type="text" name="name" id="name" class="_form-control no_margin_top @error('name') is-invalid @enderror" value="{!! old('name') !!}">
                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </p>
                <p class="w_100 pb-3">
                    <label for="category">Категория товара</label>
                    <select  name="category" id="category" class="_form-control no_margin_top @error('category') is-invalid @enderror" value="{!! old('category') !!}">
                        <option value="" hidden>Выберите категорию</option>
                        @foreach($categories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </p>
                <p class="w_100 pb-3">
                    <label for="brand">Бренд товара</label>
                    <select  name="brand" id="brand" class="_form-control no_margin_top @error('brand') is-invalid @enderror" value="{!! old('brand') !!}">
                        <option value="" hidden>Выберите бренд</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->name}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </p>
                <p class="w_100 pb-3">
                    <label for="price">Цена товара</label>
                    <input type="number" step="0.01" min="0.00" name="price" id="price" class="_form-control no_margin_top">
                </p>
                <p class="w_100 pb-3">
                    <label for="amount">Количество товара</label>
                    <input type="number" name="amount" id="amount" class="_form-control no_margin_top">
                </p>
                <p class="w_100 pb-3">
                    <label for="short_description">Короткое описание</label>
                    <textarea id="short_description" name="short_description" class="_form-control no_margin_top"></textarea>
                </p>
                <p class="w_100 pb-3">
                    <label for="full_description">Полное описание</label>
                    <textarea id="full_description" name="full_description" class="_form-control no_margin_top"></textarea>
                </p>
                <p class="w_100">
                   <input type="text" name="main_img" id="main_img" class="w-100" placeholder="Главное фото" readonly >
                   <input type="text" name="mass_img" id="mass_img" class="w_100" placeholder="Дополнительные фото" readonly >
               </p>
                <p class="w_100">
                    <button class="btn btn-block btn-success w_100" type="submit">Создать</button>
                </p>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/ckeditor.js')}}"></script>
{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create( document.querySelector( '#short_description' ) )--}}
{{--            // .create( document.querySelector( '#full_description' ) )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}
{{--    <script type="text/javascript">--}}


{{--    </script>--}}
@endsection


