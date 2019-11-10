<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'username', 'email', 'phone', 'website'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'userId');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'userId');
    }
}
