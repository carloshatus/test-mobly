<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Geo extends Model
{
    protected $fillable = [
        'lat', 'lng'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'addressId', 'id');
    }
}
