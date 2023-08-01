<?php
namespace App\Traits;

use App\Models\Vehicle;

trait CreateOrUpdateData{
    public function createVehicle($value){
        $data = Vehicle::createOrUpdate(
            [
                'id'=>$value->id
            ],
            [
                'name'=>$value->name,
                'consumption_fuel' => $value->consumption_fuel,
                'service_schedule' => $value->service_schedule,
                'type_id' => $value->type_id,
                'ownership_id' => $value->ownership_id,
            ]
        );
        return $data;
    }

}
