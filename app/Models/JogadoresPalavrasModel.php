<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JogadoresPalavrasModel extends Model
{
    //use HasFactory;
    protected $table = 'players_words';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['player_id', 'word_id'];
}
