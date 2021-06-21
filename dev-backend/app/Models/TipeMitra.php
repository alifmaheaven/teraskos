<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeMitra extends Model
{
    use HasFactory;

    protected $table = 'paket';
    protected $primaryKey = 'paketID';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'isi',
        'isActive',
    ];
}
