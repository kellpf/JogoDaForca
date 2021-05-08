<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dicas extends Model
{
    //use HasFactory;
    protected $table = 'tips';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'word_id'
    ];
}
