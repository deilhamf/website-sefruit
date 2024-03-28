<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\About;
use App\Models\Config as ModelsConfig;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\KategoriService;
use App\Models\Product;
use App\Models\Service;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartCount = Cart::count();
        $carts = Cart::with('product')
            ->latest()
            ->get();

        $abouts = About::all();
        $contacts = Contact::all();
        $visitorCount = Visitor::first()->count;
        $config = ModelsConfig::all();
        $footers = Footer::all();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();
        return view(
            'pages/cart',
            compact(
                'cartCount',
                'carts',
                'abouts',
                'contacts',
                'visitorCount',
                'config',
                'footers',
                'service',
                'services'
            )
        );
    }

    public function addToCart(Product $product)
    {
        Cart::create([
            'product_id' => $product->id,
            'quantity' => 1, // You can adjust the default quantity as needed
        ]);

        return redirect('pages/cart')->with(
            'success',
            'Produk berhasil ditambahkan ke keranjang!.'
        );
    }

    public function removeFromCart(Cart $cartItem)
    {
        $cartItem->delete();

        return redirect('/pages/cart')->with(
            'success',
            'Produk berhasil dihapusa dari keranjang!.'
        );
    }

    public function getTotalPrice()
    {
        // Ambil semua item keranjang
        $cartItems = Cart::all();

        // Hitung total harga untuk semua produk dalam keranjang
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return response()->json(['totalPrice' => $totalPrice]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->update([
            'quantity' => $request->input('quantity'),
        ]);

        // You may want to add a success message or redirect back to the cart page
        return redirect()
            ->route('cart.index')
            ->with('success', 'Cart item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
