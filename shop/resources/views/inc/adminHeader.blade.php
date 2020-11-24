@section('header')
    <div class="col container p-4">
        <div id="exchange"></div>
            <div class="w-100">
                <div class="f-row justify-between align-center pt-3">
                    <a class="navbar-brand" href="{{ url('/') }}">SHOP</a>
                    <ul class="row justify-between align-center">
                        <li class="pr-2">С возвращением, {{ Auth::guard('admin')->user()->name }}!</li>
                        <li class="btn btn-success"> <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выход') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
