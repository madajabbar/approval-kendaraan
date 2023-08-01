<?php

namespace Database\Seeders;

use App\Models\Approval;
use App\Models\Driver;
use App\Models\History;
use App\Models\Role;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleOwnership;
use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'admin',
                'level' => 'admin',
            ],
            [
                'name' => 'level1',
                'level' => 'level1',
            ],
            [
                'name' => 'level2',
                'level' => 'level2',
            ],
        ]);

        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('rahasia123'),
                'role_id' => Role::where('name','admin')->pluck('id')->first(),
            ],
            [
                'name' => 'level1',
                'email' => 'level1@example.com',
                'password' => Hash::make('rahasia123'),
                'role_id' => Role::where('name','level1')->pluck('id')->first(),
            ],
            [
                'name' => 'level2',
                'email' => 'level2@example.com',
                'password' => Hash::make('rahasia123'),
                'role_id' => Role::where('name','level2')->pluck('id')->first(),
            ],
        ]);

        VehicleType::insert(
            [
                [
                    'name' => 'Angkutan Orang'
                ],
                [
                    'name' => 'Angkutan Barang'
                ],
            ]
        );
        VehicleOwnership::insert(
            [
                [
                    'name' => 'Milik Perusahaan'
                ],
                [
                    'name' => 'Milik Perusahaan Persewaan'
                ],
            ]
        );

        $arr_user = User::whereNot('name','admin')->get();
        $arr_status = ['approved level 1','approved level 2','rejected'];
        for($i = 0; $i <20;$i++){
            $vehicle = Vehicle::create(
                [
                    'name' => 'mobil '.$i,
                    'consumption_fuel' => rand(10,15).'km/l',
                    'service_schedule' => 'Tanggal '.rand(1,25),
                    'type_id' => rand(1,2),
                    'ownership_id' => rand(1,2),
                ]
            );
            if(rand(0,1) == 0){
                $driver = Driver::create(
                    [
                        'name' => fake()->name(),
                        'vehicle_id' => $vehicle->id,
                    ]
                );
            }
            for($j=0;$j<10;$j++) {
                $user = $arr_user[rand(0,count($arr_user)-1)];
                $status = $arr_status[rand(0,2)];
                $approval = Approval::create(
                    [
                        'vehicle_id' => $vehicle->id,
                        'employee_name' => fake()->name(),
                        'date' => fake()->date(),
                        'approved_by' => $user->id,
                        'status' => $status,
                    ]
                );
                if($status == 'approved level 2'){
                    History::create(
                        [
                            'approval_id' => $approval->id,
                            'vehicle_id' => $vehicle->id
                        ]
                    );
                }
            }
        }
    }
}
