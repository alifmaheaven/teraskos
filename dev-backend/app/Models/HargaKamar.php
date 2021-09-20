<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaKamar extends Model
{
    use HasFactory;

    protected $table='listharga';
    protected $primaryKey = 'HargaID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'KamarID', 
        'penghuni',
        'lama',
        'harga',
        'isActive'
    ];
}
