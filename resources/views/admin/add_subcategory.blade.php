@extends('admin.layouts.template')
@section('page_title')
    Add Sub Category - Ecom
@endsection
@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Oldal/</span>Alkategória hozzáadása</h4>
        <div class="container">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Új alkategória hozzáadása</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store_subcategory') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Új alkategória
                                    hozzáadása</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subcategory_name"
                                        name="subcategory_name" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Válasszon kategóriát
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="category_id" name="category_id"
                                        aria-label="Default select example">
                                        <option selected>Válasszon a menüből</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Alkategória hozzáadása</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
