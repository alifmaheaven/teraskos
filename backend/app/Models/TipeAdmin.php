<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeAdmin extends Model
{
    use HasFactory;

    protected $table = 'tipeadmin';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis',
        'deskripsi',
        'tipeID',
        'isActive',
    ];
}
