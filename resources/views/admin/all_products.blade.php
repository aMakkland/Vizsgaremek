@extends('admin.layouts.template')
@section('page_title')
    All Product- Eshop
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Oldal/</span> Összes termék</h4>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ \session()->get('message') }}
            </div>
        @endif
        <div class="card">
            <h5 class="card-header">Minden elérhető termékinformáció </h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Azonosító</th>
                            <th>Termék neve</th>
                            <th>Kép</th>
                            <th>Ár</th>
                            <th>Akció</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <img style="height:100px;" src="{{ asset($product->product_img) }}" alt="">
                                    <br>
                                    <a href="{{ route('edit_product_img', $product->id) }}" class="btn btn-primary">Kép
                                        frissítése</a>
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('edit_product', $product->id) }}"
                                        class="btn btn-primary">Szerkesztés</a>
                                    <a href="{{ route('delete_product', $product->id) }}" class="btn btn-danger">Törlés</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
