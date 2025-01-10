<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'flights';

    // Set the primary key to `flights_id`
    protected $primaryKey = 'flights_id';

    // Optionally, you can specify the columns that are mass assignable
    protected $fillable = ['flight_no', 'price', 'destination_id', 'flight_image'];

    public function images()
    {
        return $this->hasMany(Image::class, 'flight_id', 'flights_id');
    }
}
