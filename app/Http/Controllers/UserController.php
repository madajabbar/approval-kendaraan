<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        if($user->role->level == 'level1'){
            $data['approval'] = Approval::where('status',null)->paginate(10);
            return view('profile',$data);
        }
        else if($user->role->level == 'level2'){
            $data['approval'] = Approval::where('status','approved level2')->paginate(10);
            return view('profile',$data);
        }
        return view('profile');
    }
    public function store(Request $request){
        $request->validate(
            [
                'approval_id' => 'required'
            ]
        );

        $data = Approval::find($request->approval_id);
        $data->approved_by = Auth::user()->id;
        if(Auth::user()->role->level == 'level1'){
            $data->status = 'approved level 1';
        }else if(Auth::user()->role->level == 'level2'){
            $data->status = 'approved level 2';
        }
        $data->save();
        return redirect()->back();
    }
}
