<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'path' ,
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
