<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class albumModel extends Model
{
    protected $table = 'album';

    protected $fillable = [
        'category',
        'title',
        'context',
        'back_img',
        'photos',
        'show',
    ];
}
