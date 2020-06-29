<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\UserRequest;
use App\Product;
use App\Cart;
use App\TagCategory;
use App\User;
use App\Contact;
use Illuminate\Support\Facades\DB;
use Auth;

class SaleController extends Controller
{
    private $product;
    private $cart;
    private $tagCategory;
    private $user;
    private $contact;

    public function __construct(Product $product, Cart $cart, TagCategory $tagCategory, User $user, Contact $contact)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->cart = $cart;
        $this->tagCategory = $tagCategory;
        $this->user = $user;
        $this->contact = $contact;
    }

    public function index(Request $request)
    {
        $searches = $request->all();
        $products = $this->product->getBySearches($searches);
        $tagCategories = $this->tagCategory->all();
        return view('user.index', compact('products', 'tagCategories', 'searches'));
    }

    public function showContact()
    {
        $user = $this->user->find(Auth::id());
        return view('user.contact', compact('user'));
    }

    public function storeContact(ContactRequest $request)
    {
        $input = $request->except('name', 'email');
        $this->contact->user_id = Auth::id();
        $this->contact->fill($input)->save();
        return redirect()->route('sale.index');
    }

    public function showProduct($productId)
    {
        $product = $this->product->find($productId);
        return view('user.product', compact('product'));
    }

    public function storeCart(CartRequest $request, $productId)
    {
        $inputs = $request->all();
        $this->cart->user_id = Auth::id();
        $sumPrice = $inputs['quentity']*$inputs['price'];
        $this->cart->sumPrice = $sumPrice;
        $this->cart->product_id = $productId;
        $this->cart->fill($inputs)->save();
        return redirect()->route('sale.show.cart');
    }

    public function showCart()
    {
        $carts = $this->cart->where('user_id', Auth::id())->get();
        $sumQuentity = $carts->count('quentity');
        $sumPrice = $carts->sum('sumPrice');
        return view('user.cart', compact('carts', 'sumQuentity', 'sumPrice'));
    }

    public function showCartProduct($cartId)
    {
        $cart = $this->cart->find($cartId);
        return view('user.cartProduct', compact('cart'));
    }

    public function updateCart(CartRequest $request, $cartId)
    {
        $inputs = $request->all();
        $sumPrice = $inputs['quentity']*$inputs['price'];
        $this->cart->find($cartId)->fill($inputs)->save();
        $this->cart->find($cartId)->sumPrice = $sumPrice;
        return redirect()->route('sale.index');

    }

    public function showCartPurchase(Request $request)
    {
        $users = $this->user->find(Auth::id());
        $carts = $this->cart->where('user_id', Auth::id())->get();
        $sumPrice = $carts->sum('sumPrice');
        $taxPrice = $sumPrice * 0.1;
        $totalPrice = $sumPrice + $taxPrice;
        return view('user.purchase', compact('users', 'carts', 'sumPrice' ,'taxPrice', 'totalPrice'));
    }


    public function storeCartPurchase(UserRequest $request)
    {
        $user = $request->except('product_id');
        $this->user->find(Auth::id())->fill($user)->save();
        $this->cart->checkoutCart();
        return view('user.completePurchase');
    }

    public function destroyByCart($cartId)
    {
        $this->cart->find($cartId)->delete();
        return redirect()->route('sale.show.cart');
    }


}
