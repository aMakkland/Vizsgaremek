@extends('admin.layouts.template')
@section('page_title')
    Edit Category - Ecom
@endsection
@section('content')
    <!-- Basic Layout -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Oldal/</span> Kategória szerkesztése</h4>
        <div class="container">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Kategória szerkesztése</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('update_category') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $category_info->id }}" name="category_id">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Kategória neve</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="category_name" name="category_name"
                                        value="{{ $category_info->category_name }}" />
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Kategória szerkesztése</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
