<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function index(){
        $data['approval'] = Approval::orderBy('id','DESC')->paginate(10);
        $data['vehicle'] = Vehicle::all();
        return view('booking',$data);
    }
    public function store(Request $request){
        $request->validate(
            [
                'employee_name' => 'required',
                'date' => 'required',
                'vehicle_id' => 'required',
            ]
            );
        $data = Approval::create(
            [
                'employee_name' => $request->employee_name,
                'date' => $request->date,
                'vehicle_id' => $request->vehicle_id
            ]
        );
        return redirect()->back();
    }
}
