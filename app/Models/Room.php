<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// 

use App\Models\Booking; // Import the Booking model
class Room extends Model
{
    
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'room_title',
        'image',
        'description',
        'price',
        'wifi',
        'room_type',
 
    ];

// في موديل Room:
public function bookings()
{
    return $this->hasMany(Booking::class);
}
}

