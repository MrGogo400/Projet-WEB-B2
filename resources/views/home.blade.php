@extends('layouts.app')

<head>
    <style>
    .pagination {
        padding-left: 500px
    }
    </style>
</head>

@section('content')
<div>
    <form action="/search" method="get">
        <div class="input-group" style="padding-left: 55px; padding-right: 55px">
            <input type="search" name="search" class="form-control">
            <span class="input-group-prepend">
                <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
<div class="container text-center">
    <h2>Produits</h2>



    <div class="row">

        @foreach ($produits as $produit)

        <div class="col-3 d-flex align-items-stretch">
            <div class="card" style="margin-bottom: 15px">
                <a href="{{ url('productdetail', $produit->id) }}">
                    <img class="card-img-top" src="afn.png" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h4 class="card-title">{{$produit->name}}</h4>
                    <p class="card-text">{{ Str::limit($produit->description, 128) }}</p>
                <h3>{{$produit->prix}}€</h3>
                </div>
                <div class="card-body">
                <a class="btn btn-outline-primary btn-sm" href="{{ route('cart.add', $produit->id) }}" class="card-link">Add to cart</a>
                <a class="btn btn-outline-primary btn-sm" href="{{ url('productdetail', $produit->id) }}" class="card-link">Product detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="align-center">
{{ $produits->links() }}
</div>
@endsection

