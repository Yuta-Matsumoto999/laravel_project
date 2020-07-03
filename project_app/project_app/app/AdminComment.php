<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Contact;

class AdminComment extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'contact_id',
        'content'
    ];

    public function contacts()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
}
