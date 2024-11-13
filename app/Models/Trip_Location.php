<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip_Location extends Model
{
    protected $table = 'trip_locations';
    protected $fillable = [
        'id',
        'famousplace',
        'country',
        'image_url',
        'description',
    ];
}
