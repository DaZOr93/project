<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    protected $fillable = ['title', 'body', 'user_id','image', 'rating', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //
}
