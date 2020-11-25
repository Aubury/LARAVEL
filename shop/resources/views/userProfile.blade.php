@extends('layouts.app')
@section('title-page')User@endsection
@section('content')
    <div class="container">
        <div class="f-col justify-center align-center">
             <div>Profile</div>
            <p>{{Auth()->user()->name}}</p>
            @foreach($users as $user)
                <p>id - {{$user->id}}</p>
                <p>Name - {{$user->name}}</p>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://kit.fontawesome.com/6c7f1b339a.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/main_page.js')}}"></script>
@endsection
