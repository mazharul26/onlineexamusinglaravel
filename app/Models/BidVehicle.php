<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidVehicle extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function bidVehicleOwner()
    {
     return $this->belongsTo(User::class, 'user_id');
    }


    public function bidVehicle()
    {
     return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'vehicle_id');
    }
}
