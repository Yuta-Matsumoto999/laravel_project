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
use Auth;

class SaleController extends Controller
{
    private $product;
    private $cart;
    private $tagCategory;
    private $user;

    public function __construct(Product $product, Cart $cart, TagCategory $tagCategory, User $user)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->cart = $cart;
        $this->tagCategory = $tagCategory;
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $inputs = $request->all();
        $products = $this->product->paginate(10);
        $tagCategories = $this->tagCategory->all();
        return view('user.index', compact('products', 'tagCategories'));
    }

    public function showContact()
    {
        $user = $this->user->find(Auth::id());
        return view('user.contact', compact('user'));
    }

    public function storeContact(ContactRequest $request)
    {
        $input = $request->all();
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
        $input = $request->all();
        $this->cart->user_id = Auth::id();
        $this->cart->product_id = $productId;
        $this->cart->fill($input)->save();
        return redirect()->route('sale.show.cart');
    }

    public function showCart()
    {
        $carts = $this->cart->where('user_id', Auth::id())->paginate(10);
        return view('user.cart', compact('carts'));
    }

    public function showCartProduct($cartId)
    {
        $cart = $this->cart->find($cartId);
        return view('user.cartProduct', compact('cart'));
    }

    public function updateCart(CartRequest $request, $cartId)
    {
        $input = $request->all();
        $this->cart->find($cartId)->fill($input)->save();
        return redirect()->route('sale.show.cart');

    }

    public function showCartPurchase(Request $request)
    {
        $users = $this->user->find(Auth::id());
        $carts = $this->cart->where('user_id', Auth::id())->get();
        return view('user.purchase', compact('users', 'carts'));
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
