@extends('layouts.adminApp')
@section('content')
    <div class="container">
        <div class="f-col justify-center align-center">
            <h2 class="center">ADMIN</h2>
            <div>Добро пожаловать в админку,{{ Auth::guard('admin')->user()->name }}</div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://kit.fontawesome.com/6c7f1b339a.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/main_page.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
@endsection
