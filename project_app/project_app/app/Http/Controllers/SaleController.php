<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Buy;
use App\TagCategory;
use App\User;
use Auth;

class SaleController extends Controller
{
    private $product;
    private $cart;
    private $buy;
    private $tagCategory;
    private $user;

    public function __construct(Product $product, Cart $cart, Buy $buy, TagCategory $tagCategory, User $user)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->cart = $cart;
        $this->buy = $buy;
        $this->tagCategory = $tagCategory;
        $this->user = $user;
    }


}
