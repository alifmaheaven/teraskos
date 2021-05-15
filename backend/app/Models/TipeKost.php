<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKost extends Model
{
    use HasFactory;

    protected $table = 'tipe';
    protected $primaryKey = 'tipeID';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MitraID',
        'nama',
        'deskripsi',
        'harga',
        'isActive',
    ];
}
