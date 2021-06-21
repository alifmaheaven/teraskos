<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class MitraKos extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'mitrakos';
    protected $primaryKey = 'MitraID';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MitraID',
        'nama',
        'email',
        'password',
        'noHP',
        'usia',
        'pekerjaan',
        'institusi',
        'testimoni',
        'paketID',
        'isActive',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }    
}