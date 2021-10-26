<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendEmailNotification;


class adminController extends Controller
{
    //

    public function showdoctor(){

        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=Doctor::all();
                return view('admin.showdoctor',compact("data"));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
        
    }
    public function doctorupload(Request $req){
        $doctor=new Doctor;
        $doctor->name=$req->name;
        $doctor->phone=$req->phone;
        $doctor->specialist=$req->specialist;
        $doctor->room_no=$req->room_no;
        
        $image=$req->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->image->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->save();

        return redirect()->back();

    }
    public function appointment(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data=Appointment::all();
                 return view('admin.Appointment',compact("data"));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
        
    }
    public function approve($id){
        $data=Appointment::find($id);
        $data->status='Approve';
        $data->save();
        return redirect()->back();
    }
    public function cancel($id){
        $data=Appointment::find($id);
        $data->status='Cancel';
        $data->save();
        return redirect()->back();
    }
    public function canceldoctor($id){
        $data=Doctor::find($id);
        $data->delete();
        return redirect()->back()->with('message','Doctor cancel successfully!');
    }
    public function updatedoctor($id){
        $data=Doctor::find($id);
        return view('admin.UpdateDoctor',compact("data"));
    }
    public function doctorupdate(Request $req,$id){
        $data=Doctor::find($id);
        $data->name=$req->name;
        $data->phone=$req->phone;
        $data->specialist=$req->specialist;
        $data->room_no=$req->room_no;
        
        $image=$req->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->image->move('doctorimage',$imagename);
        $data->image=$imagename;

        $data->save();

        return redirect('showdoctor')->with('message','Update successfull');
    }
    public function emailview($id){
        $data=Appointment::find($id);
        return view('admin.email_view',compact("data"));
    }
    public function sendemail(Request $req,$id){
        $data=Appointment::find($id);
        $details=[
            'greeting' => $req->greeting,
            'body' => $req->body,
            'actiontext' => $req->actiontext,
            'actionurl' => $req->actionurl,
            'endpart' => $req->endpart
        ];

        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with('message','Email Send Successfull');
    }
}
