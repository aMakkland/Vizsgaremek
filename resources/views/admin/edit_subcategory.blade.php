@extends('admin.layouts.template')
@section('page_title')
    Edit Category - Ecom
@endsection
@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Oladl/</span>Alkategória szerkesztése</h4>
        <div class="container">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Alkategória szerkesztése</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update_subcategory') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subcatid" value="{{ $subcatinfo->id }}">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Alkategória</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                                        value="{{ $subcatinfo->subcategory_name }}" />
                                </div>
                            </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Alkategória frissítése</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
