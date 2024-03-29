@extends('user_template.layouts.template')
@section('main-content')
    <h2>Adja meg szállítási adatait</h2>
    <div class="row">
        <div class="col-12">
            <div class="box_main">
                <form action="{{ route('add_shipping_address') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="phone_number">Telefonszám</label>
                        <input type="text" class="form-control" name="phone_number">
                    </div>

                    <div class="form-group">
                        <label for="city_name">Város/Falu neve</label>
                        <input type="text" class="form-control" name="city_name">
                    </div>

                    <div class="form-group">
                        <label for="postal_code">Irányítószám</label>
                        <input type="text" class="form-control" name="postal_code">
                    </div>
                    <input type="submit" value="Következő" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
