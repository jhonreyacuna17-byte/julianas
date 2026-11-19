<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private array $products = [
        'classic' => [
            'name' => 'Classic Roasted Cashews',
            'price' => 349,
            'image' => 'images/classic-cashews.png',
        ],
        'dark' => [
            'name' => 'Artisanal Dark Chocolate',
            'price' => 389,
            'image' => 'images/dark-chocolate-cashews.png',
        ],
        'duo' => [
            'name' => 'The Duo Gift Box',
            'price' => 710,
            'image' => 'images/dark-chocolate-cashews.png',
        ],
    ];

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        return view('cart', [
            'cart' => $cart,
            'total' => collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']),
        ]);
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'product' => ['required', 'string', 'in:classic,dark,duo'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:10'],
        ]);

        $product = $this->products[$data['product']];
        $quantity = $data['quantity'] ?? 1;
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$data['product']])) {
            $cart[$data['product']]['quantity'] = min(10, $cart[$data['product']]['quantity'] + $quantity);
        } else {
            $cart[$data['product']] = [...$product, 'quantity' => $quantity];
        }

        $request->session()->put('cart', $cart);

        return response()->json([
            'message' => $product['name'].' added to your cart.',
            'count' => collect($cart)->sum('quantity'),
        ]);
    }

    public function update(Request $request, string $product)
    {
        abort_unless(isset($this->products[$product]), 404);
        $quantity = $request->validate(['quantity' => ['required', 'integer', 'min:1', 'max:10']])['quantity'];
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$product])) {
            $cart[$product]['quantity'] = $quantity;
            $request->session()->put('cart', $cart);
        }

        return back();
    }

    public function remove(Request $request, string $product)
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$product]);
        $request->session()->put('cart', $cart);

        return back();
    }
}
