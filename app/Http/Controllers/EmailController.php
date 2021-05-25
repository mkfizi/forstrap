<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\TwoFactorRecoveryCodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendTwoFactorRecoveryCodes(Request $request){
        //Get user id from login session
        $user_id    = $request->session()->get('login')['id'];

        //Get user
        $user       = User::findOrFail($user_id);

        //Flash message
        $request->session()->flash('status', 'Recovery codes has been sent to your email address.');

        //Send email
        Mail::to($user)->send(new TwoFactorRecoveryCodes($user));

        //Return to two factor challenge page
        return back();
    }
}
