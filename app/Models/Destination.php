<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $primaryKey = 'destination_id';

    protected $fillable = [
        'name', 'description', 'country'
    ];

    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'destination_id', 'destination_id');
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'destination_id', 'destination_id');
    }

    public function travelPackages()
    {
        return $this->hasMany(TravelPackage::class, 'destination_id', 'destination_id');
    }
}
