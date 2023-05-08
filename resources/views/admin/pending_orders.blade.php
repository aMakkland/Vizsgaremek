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
                        <th>User Id</th>
                        <th>Shipping Infromation</th>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Total Will Pay</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($pending_orders as $order)
                        <tr>
                            <td>{{ $order->user_id }}</td>
                            <td>
                                <ul>
                                    <li>Phone Number - {{ $order->shipping_phone_number }}</li>
                                    <li>City - {{ $order->shipping_city }}</li>
                                    <li>Postal Code - {{ $order->shipping_postal_code }}</li>
                                </ul>
                            </td>
                            <td>{{ $order->product_id }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td><a href="" class="btn btn-success">Approve Now</a></td>
                        </tr>
                    @endforeach
            </div>
            </table>
        </div>
    </div>
@endsection
