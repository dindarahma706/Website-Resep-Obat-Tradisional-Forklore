<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepNew extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'penyakit', 'cara_pembuatan'];

    /**
     * Set the categories
     *
     */
    public function setIdBahanAttribute($value)
    {
        $this->attributes['id_bahan'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */
    public function getIdBahanAttribute($value)
    {
        return $this->attributes['id_bahan'] = json_decode($value);
    }
}
