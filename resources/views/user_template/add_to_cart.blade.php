@extends('user_template.layouts.template')
@section('main-content')
    <h2>Kosár</h2>
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
                            <th>Termék kép</th>
                            <th>Termék neve</th>
                            <th>Mennyiség</th>
                            <th>Ár</th>
                            <th>Akció</th>
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
                                <td><a href="{{ route('remove_cart_item', $item->id) }}" class="btn btn-warning">Vissza</a>
                                </td>
                            </tr>
                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                        @if ($total > 0)
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Összes</td>
                                <td>{{ $total }}</td>
                                <td><a href="{{ route('shipping_address') }}" class="btn btn-primary ">Kosár</a></td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection()
