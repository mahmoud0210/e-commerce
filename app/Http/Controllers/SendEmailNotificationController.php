<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailToAllUsersjob;
use App\Models\User;
use App\Notifications\emailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SendEmailNotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }
    //send email to users page
    public function sendEmailToUsers(){
        return view('sendnotification');
    }


    //Send email to all users
    public function sendEmailToAllUsers(Request $request)
    {
        $request->validate([
            'head'=>'required',
            'body'=>'required',
            'urlaction'=>'required'
        ]);
        $users=User::all();
        $data=[
            'head'=>$request->head,
            'body'=>$request->body,
            'urlaction'=>$request->urlaction,
        ];
        SendEmailToAllUsersjob::dispatch($users,$data);
        return redirect('/send.email')->with('success','Email will send as soon as possible');
    }
}
