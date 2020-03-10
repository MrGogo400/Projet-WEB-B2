<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Produit $produit)
    {

        // ajouter au panier
        \Cart::session(auth()->id())->add(array(
            'id' => $produit->id,
            'name' => $produit->name,
            'price' => $produit->prix,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $produit
        ));

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $cartitems = \Cart::session(auth()->id())->getContent();
        return view('cart.index', compact('cartitems'));
    }

    public function destroy($itemid)
    {
        $cartitems = \Cart::session(auth()->id())->remove($itemid);

        return back();
    }

    public function update($itemid)
    {
        \Cart::session(auth()->id())->update($rowId, [
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);

        return back();
    }
}
