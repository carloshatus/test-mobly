<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street', 'suite', 'city', 'zipcode'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function geo()
    {
        return $this->hasOne(Geo::class, 'addressId');
    }
}
