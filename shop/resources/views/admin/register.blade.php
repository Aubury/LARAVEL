@extends('layouts.adminApp')
@section('title-page')Управление Администраторами@endsection
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
                    <a class="nav-link active" href="{{route('adminRegister')}}">Администраторы</a>
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
                    <a class="nav-link" href="{{route('images')}}">Товары</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection


@section('content')
    <div class="f-row justify-center">
        <h2>Управление администраторами</h2>
    </div>
    <div class="f-row container">
        <div class="col-4 col-md-3 offset-md-9 p-2">
            <input onkeyup="tableSearch()" class="form-control mr-sm-3" id="searchAdmins" type="search" placeholder="Поиск по таблице" aria-label="Search">
        </div>
    </div>
    <div class="f-row justify-around container">
        <div class="col-3">
            <div class="widget">
                <h3>МЕНЮ</h3>
                <ul>
                    <li><a href="#" onclick="showForm('addAdmin')">Добавить администратора</a></li>
                    <li><a href="#" onclick="showForm('editAdmin')">Редактировать администратора</a></li>
                    <li><a href="#" onclick="showForm('deleteAdmin')">Удалить администратора</a></li>
                </ul>
            </div>
            <div class="block-form card border-info  mb-3" id="addAdmin">
                <div class="card-header"><h5>Добавление администратора</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('registerAdmin') }}" class="relative" id="formAddAdmins" name="formAddAdmins">
                        @csrf
                        <div class="col w-100">

                            <p><input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Имя" value="{!! old('name') !!}" required>
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="text" class="form-control @error('patronymic') is-invalid @enderror" name="patronymic" placeholder="Отчество" value="{!! old('patronymic') !!}" required>
                                @error('patronymic')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="text"  class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="Фамилия" value="{!! old('surname') !!}" required>
                                @error('surname')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="+38 (123) 456-78-90" value="{!! old('phone') !!}" required>
                                @error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="E-mail" value="{!! old('email') !!}" required>
                                @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p class="relative"><span class="password-control" onclick="show_password()"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Пароль" value="{!! old('password') !!}">
                                @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p class="relative"><span class="password-control" onclick="show_password()"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password_confirmation"  placeholder="Повторите пароль" value="{!! old('password_confirmation') !!}"></p>
                            <p><input type="submit"  value="Регистрация" class="btn btn-primary form-control"></p>
                        </div>

                    </form>
                </div>
            </div>
            <div class="block-form card border-info  mb-3" id="editAdmin">
                <div class="card-header"><h5>Редактировать администратора</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('editAdmin') }}" class="relative" id="formEditAdmin" name="formEditAdmin">
                        @csrf
                        <div class="col w-100">
                            <p><input type="text" class="form-control @error('id') is-invalid @enderror" name="id" placeholder="Id" value="{!! old('id') !!}" readonly>
                                @error('id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Имя" value="{!! old('name') !!}" required>
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="text" class="form-control @error('patronymic') is-invalid @enderror" name="patronymic" placeholder="Отчество" value="{!! old('patronymic') !!}" required>
                                @error('patronymic')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="text"  class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="Фамилия" value="{!! old('surname') !!}" required>
                                @error('surname')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="+38 (123) 456-78-90" value="{!! old('phone') !!}" required>
                                @error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="email" class="form-control @error('email') is-invalid @enderror"
                                      name="email" placeholder="E-mail" value="{!! old('email') !!}" required>
                                @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="submit"  value="Изменить" class="btn btn-primary form-control"></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="block-form card border-info  mb-3" id="deleteAdmin">
                <div class="card-header"><h5>Удалить администратора</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('deleteAdmin') }}" class="relative" id="formDeleteAdmin" name="formDeleteAdmin">
                        @csrf
                        <div class="col w-100">
                            <p><input type="text" class="form-control @error('id') is-invalid @enderror" name="id" placeholder="Id" value="{!! old('id') !!}" readonly>
                                @error('id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Имя" value="{!! old('name') !!}" required>
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="text" class="form-control @error('patronymic') is-invalid @enderror" name="patronymic" placeholder="Отчество" value="{!! old('patronymic') !!}" required>
                                @error('patronymic')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="text"  class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="Фамилия" value="{!! old('surname') !!}" required>
                                @error('surname')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                            <p><input type="submit"  value="Удалить" class="btn btn-primary form-control"></p>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-9 border-warning">
     <table class="tableAdmins w_100" id="tableAdmins">
                <tr><th>Delete</th><th>Edit</th><th>ФИО</th><th>Email</th><th>Последний визит</th></tr>
                @foreach($admins as $admin)
               <tr><td class="iconsDel"><i class="material-icons" onclick="fillInputsForm({{json_encode($admin)}},'formDeleteAdmin' )">delete</i></td>
                   <td class="iconsEd"><i class="material-icons" onclick="fillInputsForm({{json_encode($admin)}}, 'formEditAdmin')">edit</i></td>
                    <td>{{$admin['surname']}}<br>{{$admin['name']}}<br>{{$admin['patronymic']}}<br></td>
                    <td>{{$admin['email']}}</td>
                    <td>{{$admin['last_visit']}}<br></td>
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
        let admins = '@json($admins[0])';
        getAllMass(admins);
    </script>

@endsection
