@extends('user_template.layouts.template')
@section('main-content')
    <h2>Add To Cart</h2>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ \session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="box_main">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_items as $item)
                            <tr>
                                @php
                                    $product_name = App\Models\Products::where('id', $item->product_id)->value('product_name');
                                    $img = App\Models\Products::where('id', $item->product_id)->value('product_img');
                                @endphp
                                <td><img src="{{ asset($img) }}" style="height: 100px"></td>
                                <td>{{ $product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td><a href="{{ route('remove_cart_item', $item->id) }}" class="btn btn-warning">Remove</a>
                                </td>
                            </tr>
                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td>{{ $total }}</td>
                            @if ($total <= 0)
                            @else
                                <td><a href="" class="btn btn-primary">Checkout</a></td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection()
