<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Craft extends Model
{
    use HasFactory;
    protected $table = 'craft';
    protected $fillable = [
        'bahan1',
        'bahan2',
        'bahan3',
        'hasil',
    ];
}
