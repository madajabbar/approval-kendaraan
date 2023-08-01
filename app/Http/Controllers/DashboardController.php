<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\History;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleOwnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(){
        $data['vehicle'] = count(Vehicle::all());
        $data['user'] = count(User::all());
        $data['history'] = count(History::all());
        $data['driver'] = count(Driver::all());
        return view('dashboard',$data);
    }
    public function value(){
        $data['vehicle'] = Vehicle::pluck('name');
        $data['history'] = History::select('vehicle_id',DB::raw('count(*) as total'))->groupBy('vehicle_id')
        ->pluck('total');
        return response()->json($data);
    }
}
