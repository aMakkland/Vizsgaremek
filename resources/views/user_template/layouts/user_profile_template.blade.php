@extends('user_template.layouts.template')
@section('main-content')
    <h2>Welcome {{ Auth::user()->name }}</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li> <a href="{{ route('user_profile') }}">Dashboard</a></li>
                        <li> <a href="">Pending Orders</a></li>
                        <li> <a href="">History</a></li>
                        <li> <a href="">Logout</a></li>
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
