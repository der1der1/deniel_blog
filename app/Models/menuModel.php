<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class menuModel extends Model
{
    use HasFactory;
    
    protected $table = 'menu';

    protected $fillable = [
        'category',
        'title',
        'context',
        'show',
    ];
}
