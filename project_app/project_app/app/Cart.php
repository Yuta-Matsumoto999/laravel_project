<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Product;

class Cart extends Model
{
    use SoftDeletes;

    protected $lillable = [
        'user_id',
        'product_id',
        'quentity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'user_id');
    }


}
