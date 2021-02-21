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
            <h2>Изменить продукт</h2>
        </div>
        <div class="f-row justify-around container">
            <div class="col-4">
                {{----------  Главное изображение -----------}}
                <div class="card border-info  mb-3">
                    <div class="card-header"><h5>Главное изображения</h5></div>
                    <div class="card-body">
                        <!--Our component:-->
                        <change_main_image_form product = '@json($product)'></change_main_image_form>
                        <input type="text" name="id_main_img" id="id_main_img" value="{{$product[0]['main_img'] != 'No image!' ? $product[0]['id_main_img'] : 'No image!'}}" class="_form-control no_margin_top">
                        <div class="f-row justify-center align-center mt-3">
                            @if($product[0]['main_img'] != 'No image!')
                                <img src="{{ asset('upload/'.$product[0]['main_img']) }}" class="min_photo">
                            @else
                                <span>No picture</span>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="card border-info  mb-3">
                    <div class="card-header"><h5>Дополнительные изображения</h5></div>
                    <div class="card-body">
                        <!--Our component:-->
                        <add_array_images_form/>
                    </div>
                </div>

            </div>
            <div class="col-8 border-warning">
                <form action="{{route('add_product')}}" method="post">
                    @csrf
                    <p class="w_100 pb-3 ">
                        <label for="name">ID товара</label>
                        <input type="text" name="name" id="name" class="_form-control no_margin_top @error('name') is-invalid @enderror" value="{{isset($product[0]['id']) ? $product[0]['id'] : old('name')}}" readonly>
                        @error('id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </p>
                    <p class="w_100 pb-3 ">
                        <label for="name">Назание товара</label>
                        <input type="text" name="name" id="name" class="_form-control no_margin_top @error('name') is-invalid @enderror" value="{{isset($product[0]['name']) ? $product[0]['name'] : old('name')}}">
                        @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </p>
                    <p class="w_100 pb-3">
                        <label for="category">Категория товара</label>
                        <select  name="category" id="category" class="_form-control no_margin_top @error('category') is-invalid @enderror" value="$product[0]['category']">
                            @foreach($categories as $category)
                                <option value="{{$category->name}}" @if($category->name ===  old('category')) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </p>
                    <p class="w_100 pb-3">
                        <label for="brand">Бренд товара</label>
                        <select  name="brand" id="brand" class="_form-control no_margin_top @error('brand') is-invalid @enderror" value="$product[0]['brand']">
                            @foreach($brands as $brand)
                                <option value="{{$brand->name}}" @if($brand->name === old('brand')) selected @endif>{{$brand->name}}</option>
                            @endforeach
                        </select>
                        @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </p>
                    <p class="w_100 pb-3">
                        <label for="price">Цена товара</label>
                        <input type="number" step="0.01" min="0.00" name="price" id="price" class="_form-control no_margin_top" value="{{isset($product[0]['price']) ? $product[0]['price'] : old('price')}}">
                    </p>
                    <p class="w_100 pb-3">
                        <label for="amount">Количество товара</label>
                        <input type="number" name="amount" id="amount" class="_form-control no_margin_top" value="{{isset($product[0]['amount']) ? $product[0]['amount'] : old('amount')}}">
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
                        <input type="text" name="main_img" id="main_img" class="w-100" placeholder="Главное фото"  value="{{isset($product[0]['id_main_img']) ? $product[0]['id_main_img'] : old('main_img')}}">
                        <input type="text" name="mass_img" id="mass_img" class="w_100" placeholder="Дополнительные фото"  value="{{isset($product[0]['id_mass_img']) ? $product[0]['id_mass_img'] : old('mass_img')}}">
                    </p>
                    <p class="w_100">
                        <button class="btn btn-block btn-success w_100" type="submit">Создать</button>
                    </p>
                </form>
            </div>
        </div>

{{--        <div class="col-4">--}}
{{--            <div class="f-col">--}}
{{--                <form v-on:submit="submitFile" :id="id">--}}
{{--                    <input type="hidden" name="_token" :value="csrf">--}}
{{--                    <div class="example-1">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="label_input-file">--}}
{{--                                <i class="material-icons">attach_file</i>--}}
{{--                                <span class="title" data-multiple-caption="Вы выбрали {count} файла!">Добавить файл</span>--}}
{{--                                <input type="file" name="files" ref="file" onchange="change_lable_text(event.target)" v-on:change="handleFileUpload()">--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>--}}
{{--                    <button type="submit" class="btn btn-success">Добавить</button>--}}
{{--                </form>--}}



{{--                <label for="main_photo">Главное изображение</label>--}}
{{--                <input type="file" name="main_img" id="main_img" placeholder="Загрузите изображение" value="{{$product[0]['main_img']}}" enctype="multiform/form-data">--}}
{{--                <div class="f-row">--}}
{{--                    @if(!empty($product[0]['main_img']))--}}
{{--                        <img src="{{ asset('upload/'.$product[0]['main_img'])}}" class="min_photo">--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="pb-3 f-col">--}}
{{--                <label for="mass_img">Дополнительные изображения</label>--}}
{{--                <input id="mass_img" type="file" name="mass_img[]" placeholder="Загрузите изображение" value="{{$product[0]['mass_img']}}" enctype="multiform/form-data">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-8 border-warning">--}}
{{--            <form action="{{route('edit_product')}}" method="post">--}}
{{--                @csrf--}}
{{--                <input type="text" name="id" id="id" value="{{$product['id']}}" hidden>--}}
{{--                <p class="pb-3">--}}
{{--                    <label for="name">Назание товара</label>--}}
{{--                    <input type="text" name="name" id="name" class="_form-control no_margin_top @error('name') is-invalid @enderror" value="{{$product['name']}}">--}}
{{--                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror--}}
{{--                </p>--}}
{{--                <p class="pb-3">--}}
{{--                    <label for="category">Категория товара</label>--}}
{{--                    <select  name="category" id="category" class="_form-control no_margin_top @error('category') is-invalid @enderror" value="{{$product['category']}}">--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <option value="{{$category->name}}">{{$category->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror--}}

{{--                </p>--}}
{{--                <p class="pb-3">--}}
{{--                    <label for="brand">Бренд товара</label>--}}
{{--                    <select  name="brand" id="brand" class="_form-control no_margin_top @error('brand') is-invalid @enderror" value="{{$product->brand}}">--}}
{{--                        @foreach($brands as $brand)--}}
{{--                            <option value="{{$brand->name}}">{{$brand->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror--}}

{{--                </p>--}}
{{--                <p class="pb-3">--}}
{{--                    <label for="price">Цена товара</label>--}}
{{--                    <input type="number" name="price" id="price" class="_form-control no_margin_top" value="{{$product['price']}}">--}}
{{--                </p>--}}
{{--                <p class="pb-3">--}}
{{--                    <label for="amount">Количество товара</label>--}}
{{--                    <input type="number" name="amount" id="amount" class="_form-control no_margin_top" value="{{$producta['mount']}}">--}}
{{--                </p>--}}
{{--                <p class="pb-3">--}}
{{--                    <label for="short_description">Короткое описание</label>--}}
{{--                    <textarea id="short_description" name="short_description" class="_form-control no_margin_top" value="{{$product['short_description']}}"></textarea>--}}
{{--                </p>--}}
{{--                <p class="pb-3">--}}
{{--                    <label for="full_description">Полное описание</label>--}}
{{--                    <textarea id="full_description" name="full_description" class="_form-control no_margin_top" value="{{$product['full_description']}}"></textarea>--}}
{{--                </p>--}}
{{--                <p><button class="btn btn-block btn-success" type="submit">Изменить</button></p>--}}
{{--            </form>--}}
{{--        </div>--}}

@endsection

@section('scripts')
    <script>
        let short_description = '@json($product[0]['short_description'])',
            full_description = '@json($product[0]['full_description'])',
            main_img = '@json($product[0]['main_img'])',
            mass_img = '@json($product[0]['mass_img'])';
        // console.log(short_description.slice(1,-1));
        // console.log(full_description.slice(1,-1));
        // console.log(main_img);
        // console.log(mass_img);

        if(short_description !== 'null'){
            window.app.__vue__.short_description = short_description.slice(1,-1);
        }
        if(full_description !== 'null'){
            window.app.__vue__.full_description = full_description.slice(1,-1);
        }
    </script>
@endsection


