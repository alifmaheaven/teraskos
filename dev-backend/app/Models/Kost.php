<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;
    
    protected $table = 'kost';
    protected $primaryKey = 'KostID';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MitraID',
        'nama',
        'deskripsi',
        'provinsi',
        'kota',
        'kodepos',
        'alamat',
        'isActive'
   ];
}
