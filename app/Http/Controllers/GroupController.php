<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Groupmap;
use Auth;

class GroupController extends Controller
{
    public function index(){
        return view('group');
    }

    public function indexCreate(){
        return view('createGroup');
    }

    public function create(Request $request){
        $name = $request->name;
        $desc = $request->desc;
        $admin = Auth::user()->name;

        do{
            $code = $this->generateRandomString();
        }while(Group::where('code', $code)->count() != 0);

        Group::create([
            'name' => $name,
            'desc' => $desc,
            'admin' => $admin,
            'code' => $code
        ]);

        Groupmap::create([
            'user' => $admin,
            'code' => $code,
            'isAdmin' => true
        ]);

        return 200;
    }

    public function generateRandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getGroup(Request $request){
        $user = Auth::user()->name;
        $groups = Group::where('admin', $user)->get();

        return $groups;
    }
}
