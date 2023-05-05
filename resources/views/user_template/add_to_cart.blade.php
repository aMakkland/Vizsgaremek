@extends('user_template.layouts.template')
@section('main-content')
    <h2>Add To Cart</h2>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ \session()->get('message') }}
        </div>
    @endif
@endsection()
