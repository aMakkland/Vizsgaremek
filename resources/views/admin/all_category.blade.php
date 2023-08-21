@extends('admin.layouts.template')
@section('page_title')
    All Category- Eshop
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Oldal/</span> Összes kategória</h4>
        <div class="card">
            <h5 class="card-header">Elérhető kategória információk</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ \session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Azonosító</th>
                            <th>Kategória neve</th>
                            <th>Alkategória</th>
                            <th>Termékek</th>
                            <th>Akciók</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->sub_category_count }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="{{ route('edit_category', $category->id) }}"
                                        class="btn btn-primary">Szerkesztés</a>
                                    <a href="{{ route('delete_category', $category->id) }}"
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
