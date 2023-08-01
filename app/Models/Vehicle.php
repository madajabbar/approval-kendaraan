<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function driver(){
        return $this->hasOne(Driver::class);
    }
    public function approval(){
        return $this->hasMany(Approval::class);
    }

    public function vehicleType(){
        return $this->belongsTo(VehicleType::class, 'type_id');
    }
    public function vehicleOwnership(){
        return $this->belongsTo(VehicleOwnership::class, 'ownership_id');
    }

}
