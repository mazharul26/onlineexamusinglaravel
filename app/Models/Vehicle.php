<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $guarded=[];

    // protected $fillable = [
    //     'name',
    //     'no_of_seats',
    //     'license_no',
    //     'description',
    //     'user_id'
    // ];



    public function vehicleUser()
    {
     return $this->belongsTo(User::class, 'user_id');
    }
}
