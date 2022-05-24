<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'bidding_price',
        'description',
        'user_id',
        'order_id'
    ];
   

    public function veicleorder()
    {
     return $this->belongsTo(VeicleOrder::class, 'order_id');
    }

    public function bidOwner()
    {
     return $this->belongsTo(User::class, 'user_id');
    }
}
