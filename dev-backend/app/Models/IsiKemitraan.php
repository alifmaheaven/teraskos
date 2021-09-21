<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiKemitraan extends Model
{
    use HasFactory;

    protected $table = 'isikemitraan';
    protected $primaryKey = 'IsiPaketID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'layanan',
        'nilai',
        'PaketID',
        'isActive'
    ];
}
