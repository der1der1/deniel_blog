<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menuModel extends Model
{
    
    protected $table = 'menu';

    protected $fillable = [
        'category',
        'icon_dir',
        'back_img',
        'title',
        'show',
    ];
}
