<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class articleModel extends Model
{
    protected $table = 'article';

    protected $fillable = [
        'category',
        'title',
        'context',
        'back_img',
        'views',
        'show',
    ];
}
