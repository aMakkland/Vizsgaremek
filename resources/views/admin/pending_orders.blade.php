@extends('admin.layouts.template')
@section('page_title')
    Pending Orders - Eshop
@endsection
@section('content')
    <div class="container my-5">
        <div class="card p-4">
            <div class="card-title">
                <h2>Pending Orders</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Felhasználó azonosítója</th>
                        <th>Szállítási információk</th>
                        <th>Termék azonosítója</th>
                        <th>Mennyiség</th>
                        <th>Összes fizetés</th>
                        <th>Akció</th>
                    </tr>
                    @foreach ($pending_orders as $order)
                        <tr>
                            <td>{{ $order->user_id }}</td>
                            <td>
                                <ul>
                                    <li>Telefonszám - {{ $order->shipping_phone_number }}</li>
                                    <li>Város - {{ $order->shipping_city }}</li>
                                    <li>Irányítószám - {{ $order->shipping_postal_code }}</li>
                                </ul>
                            </td>
                            <td>{{ $order->product_id }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td><a href="" class="btn btn-success">Jóváhagyás most</a></td>
                        </tr>
                    @endforeach
            </div>
            </table>
        </div>
    </div>
@endsection
