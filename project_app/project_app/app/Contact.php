<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
