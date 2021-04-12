<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasPalavras extends Model
{
    //use HasFactory;
    protected $table = 'group_of_words';
    public $timestamps = false;
    protected $fillable = [
        'id', 'group'
    ];
}
