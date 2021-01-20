<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carry extends Model
{
    use HasFactory;

    protected $table = 'carries';

    protected $fillable = [
        'price',
        'count',
    ];
}
