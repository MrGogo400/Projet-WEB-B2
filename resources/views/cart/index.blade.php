@extends('layouts.app')

@section('content')

    <h2>Votre Panier</h2>


        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Quantité</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($cartitems as $item)
                <tr>
                    <td scope="row">{{ $item->name }}</td>
                    <td>
                        {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
                    </td>
                    <td>
                    <form action="{{route('cart.update', $item->id)}}">
                        <input name="quantity" type="number" value ="{{ $item->quantity }}">

                        <input type="submit" value="save">

                    </form>
                    </td>
                    <td>
                    <a href="{{ route('cart.destroy', $item->id) }}">Supprimer</a>
                    </td>
                </tr>
    @endforeach
            </tbody>
        </table>

        <H3>
            Total : {{\Cart::session(auth()->id())->getTotal()}} €
        </H3>


    <a class="btn btn-primary" href="{{ route('cart.checkout') }}" role="button">Continuer</a>
@endsection
