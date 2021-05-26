<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    protected $primaryKey = 'fasilitasID';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'deskripsi',
        'isActive',
    ];
}
