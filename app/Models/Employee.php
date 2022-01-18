<?php

namespace App\Models;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone', 'password'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
