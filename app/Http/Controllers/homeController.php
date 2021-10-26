<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class homeController extends Controller
{
    //

    public function redirects(){
        if(Auth::id()){
            if(Auth::User()->usertype=='0'){
                 $data=Doctor::all();
                return view('user.Home',compact("data"));
            }else{
                return view('admin.Home');
            }
        }else{
            return redirect()->back();
        }
    }

    public function index(){

        if(Auth::id()){
            return redirect('home');
        }else{
            $data=Doctor::all();
        return view('user.Home',compact("data"));
    }
        }

    public function appointment(Request $req){
        $data=new Appointment;
        $data->name=$req->name;
        $data->email=$req->email;
        $data->phone=$req->phone;
        $data->doctor=$req->doctor;
        $data->date=$req->date;
        $data->message=$req->message;
        $data->status='In Pendding';
        if(Auth::id()){
            $data->user_id=Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message','Appointmet successful. We will contact with you soon!');
    }


    public function myappointment(){

        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $user_id=Auth::user()->id;
            $appoint=Appointment::where('user_id',$user_id)->get();
            return view('user.myappointment',compact('appoint'));
        }else{
            return redirect()->back();
        }
            
        }else{
          return redirect()->back();  
        }
        
    }
    public function removeappointment($id){
        $data=Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }

        
}
