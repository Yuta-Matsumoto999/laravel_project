<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Product;
use Auth;

class Cart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'quentity',
        'price',
        'sumPrice'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'user_id');
    }

    public function sumPrice($input)
    {
        $sumPrice = $input['price'] * $input['quentity'];
        return $sumPrice;
    }

    public function checkoutCart()
    {
        $this->where('user_id', Auth::id())->delete();
    }


}
