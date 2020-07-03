<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\TagCategory;
use App\User;
use App\Contact;
use Auth;

class AdminController extends Controller
{
    public function __construct(Product $product, Cart $cart, TagCategory $tagCategory, User $user, Contact $contact)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->cart = $cart;
        $this->tagCategory = $tagCategory;
        $this->user = $user;
        $this->contact = $contact;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function showUsers()
    {
        $users = $this->user->all();
        return view('admin.users', compact('users'));
    }

    public function editUser($userId)
    {
        $user = $this->user->find($userId);
        return view('admin.usersEdit', compact('user'));
    }

    public function updateUser(Request $request, $userId)
    {
        $input = $request->all();
        $this->user->find($userId)->fill($input)->save();
        return redirect()->to('admin.users');
    }

    public function showproducts()
    {
        $products = $this->product->all();
        return view('admin.products', compact('products'));
    }

    public function createProduct()
    {
        return view('admin.productCreate');
    }

    public function storeProduct(Request $request, $productId)
    {
        $input = $request->all();
        $this->product->fill($input)->save();
        return redirect()->to('admin.products');
    }

    public function editProduct($productId)
    {
        $product = $this->product->find($productId);
        return view('admin.productEdit', compact('product'));
    }

    public function updateProduct(Request $request, $productId)
    {
        $input = $request->all();
        $this->product->find($productId)->fill($input)->save();
        return redirect()->to('admin.products');
    }

    public function destroyProduct($productId)
    {
        $this->product->find($productId)->delete();
        return redirect()->to('admin.products');
    }

    public function showContacts()
    {
        $contacts = $this->contact->all();
        return view('admin.contacts', compact('contacts'));
    }

    public function editComment($contactId)
    {
        $contact = $this->contact->find($contactId);
        return view('admin.contactEdit', compact('contact'));
    }

    public function storeComment(Request $request, $contactId)
    {
        $input = $request->all();
        $this->comment->contact_id =$contactId;
        $this->comment->fill($input)->save();
        return redirect()->to('admin.contacts');
    }

    public function destroyContact($contactId)
    {
        $this->contact->find($contactId)->delete();
        return redirect()->to('admin.contacts');
    }
}
