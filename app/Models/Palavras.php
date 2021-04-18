<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palavras extends Model
{
    use HasFactory;

    protected $table = 'words';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
     'word', 'group_id', 'word_tip', 'created_at', 'updated_at'
    ];
}
