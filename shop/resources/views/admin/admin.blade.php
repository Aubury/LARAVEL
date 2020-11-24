@extends('layouts.adminApp')

@section('navigation')
    <nav class="container navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admin')}}">Жалобы</a>
                </li>
               <li class="nav-item">
                    <a class="nav-link" href="{{route('adminRegister')}}">Управление администраторами</a>
                </li>
            </ul>
{{--            <button class="btn btn-success" id="exit"><a  href="{{ route('logout') }}" onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                    {{ __('Выход') }}--}}
{{--                </a>--}}
{{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                    @csrf--}}
{{--                </form>--}}
{{--            </button>--}}
        </div>
    </nav>
@endsection
@section('content')
    <div class="container">
        <div class="f-col justify-center align-center">
            <h2 class="center">ADMIN</h2>
            <div>Добро пожаловать в админку, {{ Auth::guard('admin')->user()->name }}!</div>
        </div>
        <table class="tableAdmins w_100" id="tableAdmins">
            <tr><th>Delete</th><th>Edit</th><th>ФИО</th><th>Email</th><th>Последний визит</th></tr>
            @foreach($admins as $admin)
                <tr>
                    <td class="iconsEd"><i class="material-icons" id="ed_{{$admin['id']}}">create</i></td>
                    <td>{{$admin['surname']}}<br>{{$admin['name']}}<br>{{$admin['patronymic']}}<br></td>
                    <td>{{$admin['email']}}</td>
                    <td>{{$admin['last_visit']}}<br></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
@section('scripts')
    <script src="https://kit.fontawesome.com/6c7f1b339a.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('js/main_page.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
@endsection
