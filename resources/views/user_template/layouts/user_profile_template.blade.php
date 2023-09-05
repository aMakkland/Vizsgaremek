@extends('user_template.layouts.template')
@section('main-content')
    <h2>Üdvözlöm {{ Auth::user()->name }}</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li> <a href="{{ route('Home') }}">Kezdőoldal</a></li>
                        <li> <a href="{{ route('pending_orders') }}">Függőben lévő rendelés</a></li>
                        <li> <a href="{{ route('history') }}">Vásárlási előzmények</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Kijelentkezés</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    @yield('profile_content')
                </div>
            </div>
        </div>
    </div>
@endsection()
