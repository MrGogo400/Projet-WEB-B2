@extends('layouts.app')

@section('content')

    <h2>Votre Panier</h2>

    <h3>Informations sur la livraison</h3>

    <form action="{{route('orders.store')}}" method="post">
        @csrf


        <div class="form-group">
            <label for="">Nom Entier</label>
            <input type="text" name="shipping_fullname" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Région</label>
            <input type="text" name="shipping_state" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Ville</label>
            <input type="text" name="shipping_city" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Code postal</label>
            <input type="number" name="shipping_zipcode" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Adresse de livraison</label>
            <input type="text" name="shipping_address" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Téléphone Mobile</label>
            <input type="text" name="shipping_phone" id="" class="form-control">
        </div>

        <h4>Option de paiement</h4>

        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="payment_method" id="" value="paypal">
                Paypal

            </label>

        </div>


        <button type="submit" class="btn btn-primary mt-3">Place Order</button>


    </form>

@endsection
