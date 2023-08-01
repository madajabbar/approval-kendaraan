<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(){
        $data['vehicle'] = Vehicle::orderBy('id', 'desc')->paginate(10);
        return view('vehicle',$data);
    }
}
