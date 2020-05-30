<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','user_id','phone1','departemen_kode',
        'divisi_kode','grade','picture'
    ];

    public function departemen()//childnya
    {
        return $this->belongsTo('App\Departemen','departemen_kode','kode');
        // FK-->divisi_kode pada table departement, ID --> dari divisi
    }

    public function divisi()//childnya
    {
        return $this->belongsTo('App\Divisi','divisi_kode','kode');
        // FK-->divisi_kode pada table departement, ID --> dari divisi
    }

    /**
     *
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
