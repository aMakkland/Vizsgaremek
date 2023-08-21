@extends('admin.layouts.template')
@section('page_title')
    Edit Product Image - Ecom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Oldal/</span>Termék kép szerkesztése</h4>
        <div class="container">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Termék kép szerkesztése</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update_product_img') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product_info->id }}" name="id" />
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Előző kép</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset($product_info->product_img) }}" alt="">
                                </div>
                            </div>

                            <input type="hidden" name="id" value="{{ $product_info->id }}">


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Új kép feltöltése</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="product_img" name="product_img" />
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Termék kép frissítése</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
