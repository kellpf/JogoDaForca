<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogadores extends Model
{
    //use HasFactory;
    protected $table = 'players';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name', 'available_tips', 'group_of_words_id', 'punctuation', 'roles_id', 'created_at', 'updated_at'
    ];
}
