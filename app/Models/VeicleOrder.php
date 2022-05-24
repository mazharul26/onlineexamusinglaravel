<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeicleOrder extends Model
{
    use HasFactory;
    protected $guarded=[];

    // protected $fillable = [
    //     'date',
    //     'time',
    //     'location',
    //     'budget',
    //     'description',
    //     'user_id',
    //     'order_status',
    //     'approved_user_id'
    // ];



    public function OrderDivision(){
		return $this->belongsTo('App\Models\Division', 'load_division');
	}

    public function OrderDistrict(){
		return $this->belongsTo('App\Models\District', 'load_district');
	}

    public function OrderThana(){
		return $this->belongsTo('App\Models\Upazila', 'load_thana');
	}


    public function OrderUnloadDivision(){
		return $this->belongsTo('App\Models\Division', 'unload_division');
	}

    public function OrderUnloadDistrict(){
		return $this->belongsTo('App\Models\District', 'unload_district');
	}

    public function OrderUnloadThana(){
		return $this->belongsTo('App\Models\Upazila', 'unload_thana');
	}


    public function orderOwner(){
		return $this->belongsTo('App\Models\User', 'user_id');
	}
}
