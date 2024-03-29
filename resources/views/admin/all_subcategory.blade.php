@extends('admin.layouts.template')
@section('page_title')
    All Sub Category- Eshop
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Olda/</span> Összes alkategória</h4>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ \session()->get('message') }}
            </div>
        @endif
        <div class="card">
            <h5 class="card-header">Elérhető alkategória információk</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Azonosító</th>
                            <th>Alkategória neve</th>
                            <th>Kategória</th>
                            <th>Termék</th>
                            <th>Akció</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($all_subcategories as $sub_category)
                            <tr>
                                <td>{{ $sub_category->id }}</td>
                                <td>{{ $sub_category->category_name }}</td>
                                <td>{{ $sub_category->subcategory_name }}</td>
                                <td>{{ $sub_category->product_count }}</td>
                                <td>
                                    <a href="{{ route('edit_subcategory', $sub_category->id) }}"
                                        class="btn btn-primary">Szerkesztés</a>
                                    <a href="{{ route('delete_subcategory', $sub_category->id) }}"
                                        class="btn btn-danger">Törlés</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
