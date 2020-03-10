@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Produits</h2>

    <div class="row">

        @foreach ($allproduits as $produit)

        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('afn.png') }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$produit->name}}</h4>
                    <p class="card-text">{{$produit->description}}</p>
                </div>
                <div class="card-body">
                <a href="{{ route('cart.add', $produit->id) }}" class="card-link">Ajouter au panier</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
