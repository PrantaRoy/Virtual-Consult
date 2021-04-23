<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'address' => 'object',
        'ver_code_send_at' => 'datetime'
    ];

    public function login_logs()
    {
        return $this->hasMany(UserLogin::class);

    }


    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function scopeActive()
    {
        return $this->where('status', 1);
    }

    public function scopeBanned()
    {
        return $this->where('status', 0);
    }

    public function scopeEmailUnverified()
    {
        return $this->where('ev', 0);
    }

}
