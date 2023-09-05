@extends('user_template.layouts.template')
@section('main-content')
    <h2>Utólsó lépés a rendelés megerősítéséhez</h2>
    <div class="row">
        <div class="col-8">
            <div class="box_main">
                <h3>A terméket a következő címre küldjük:</h3>
                <p> {{ $shipping_address->user_id }}</p>
                <p> {{ $shipping_address->city_name }}</p>
                <p> {{ $shipping_address->postal_code }}</p>
                <p> {{ $shipping_address->phone_number }}</p>

            </div>
        </div>
        <div class="col-4">
            <div class="box_main">
                <h3>Az ön termékei </h3>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Termék neve</th>
                            <th>mennyiség</th>
                            <th>Ár</th>
                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_items as $item)
                            <tr>
                                @php
                                    $product_name = App\Models\Products::where('id', $item->product_id)->value('product_name');
                                @endphp
                                <td>{{ $product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                            </tr>
                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                        <tr>
                            <td></td>
                            <td>Összes</td>
                            <td>{{ $total }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <form action="" method="POST">
            @csrf
            <input type="submit" value="Rendelés törlése" class="btn btn-danger mr-3">
        </form>

        <form action="{{ route('palce_order') }}" method="POST">
            @csrf
            <input type="submit" value="Rendelés megerősítése" class="btn btn-primary ">
        </form>
    </div>
@endsection
