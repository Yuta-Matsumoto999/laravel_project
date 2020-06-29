<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TagCategory;
use App\Cart;
use App\Buy;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tag_category_id',
        'name',
        'price',
        'photo',
        'content'
    ];

    protected $dates = [
        'created_at'
    ];

    public function tagCategories()
    {
        return $this->belongsTo(TagCategory::class, 'tag_category_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }

    public function buys()
    {
        return $this->hasMany(Buy::class, 'product_id');
    }

    public function getBySearches($searches)
    {
        return $this->when(isset($searches['tag_category_id']), function ($query) use ($searches) {
            $query->where('tag_category_id', $searches['tag_category_id']);
        })->when(isset($searches['name']), function ($query) use ($searches) {
            $query->where('name', 'like', '%' . $searches['name'] . '%');
        })
        ->orderBy('updated_at')
        ->paginate(10);
    }

}
