<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Company extends Model Implements JWTSubject
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'logo', 'website', 'token'];


    public function employee()
    {
        return $this->hasMany(\App\Models\Employee::class, 'company_id', 'id');
    }

    public function create()
    {
        return $this->belongsTo(User::class);
    }

    public function getLogo()
    {
        if(!$this->logo)
        {
            return asset('img/user.png');
        }
        return asset('img/',$this->logo);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
