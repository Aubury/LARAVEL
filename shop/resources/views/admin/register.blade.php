@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="col justify-content-center">
            <h2 class="center">ADMIN REGISTER</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Регистрация Администратора') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('registerAdmin') }}" class="relative">
                                @csrf
                                <div class="col">
                                    <p><input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" placeholder="Имя" value="{!! old('name') !!}" required>
                                        @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                                    <p><input type="text" class="form-control @error('patronymic') is-invalid @enderror" id="patronymic"  name="patronymic" placeholder="Отчество" value="{!! old('patronymic') !!}" required>
                                        @error('patronymic')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                                    <p><input type="text"  class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" placeholder="Фамилия" value="{!! old('surname') !!}" required>
                                        @error('surname')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                                    <p><input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="+38 (123) 456-78-90" value="{!! old('phone') !!}" required>
                                        @error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                                    <p><input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Город" value="{!! old('city') !!}" required>
                                        @error('city')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                                    <p><input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="E-mail" value="{!! old('email') !!}" required>
                                        @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                                    <p class="relative"><span class="password-control" onclick="show_password()"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                        <input type="password" id="password"  class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Пароль" value="{!! old('password') !!}" required>
                                        @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</p>

                                    <p class="relative"><span class="password-control" onclick="show_password()"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                        <input type="password" id="password_confirmation"  class="form-control" name="password_confirmation"  placeholder="Повторите пароль" value="{!! old('password_confirmation') !!}" required></p>
                                    <p><input type="submit"  value="Регистрация" class="btn btn-primary form-control"></p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://kit.fontawesome.com/6c7f1b339a.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/main_page.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
@endsection
