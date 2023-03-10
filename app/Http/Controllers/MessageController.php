<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Auth;

class MessageController extends Controller
{
    public function create(Request $request){
        Message::create([
            'user' => Auth::user()->name,
            'text' => $request->text,
            'groupID' => $request->groupID
        ]);
        return 200;
    }

    public function getMessage(Request $request){
        $sms = Message::where('groupID', $request->groupID)->orderBy('id')->get();
        return $sms;
    }
}
