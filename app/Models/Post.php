<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
    ];

    use Commentable;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
