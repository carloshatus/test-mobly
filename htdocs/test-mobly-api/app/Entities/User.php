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
        return $this->hasOne(Address::class, 'userId', 'id');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'userId', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'userId', 'id');
    }
}
