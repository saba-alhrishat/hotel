<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;


class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;
        protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
    ];

    // public function room()
    // {
    //     return $this->hasOne('App\Models\Room', 'id', 'room_id');
    // }
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
 


    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
