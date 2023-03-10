<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Planmap;
use App\Models\Group;
use Auth;

class PlanController extends Controller
{
    public function index(){
        return view('yourPlans');
    }

    public function indexCreate(){
        return view('createPlan');
    }

    public function indexJoin(Request $request)
    {
        $code = $request->code;
        $plan = Plan::where('code', $code)->first();
        return view('joinPlan', ['plan' => $plan]);
    }
    public function create(Request $request){
        $groupID = $request->groupID;
        $name = $request->name;
        $desc = $request->desc;
        $date = $request->date;
        $time = $request->time;
        $budget = $request->budget;
        $admin = Auth::user()->name;
        do{
            $code = $this->generateRandomString();
        }while(Group::where('code', $code)->count() != 0);

        Plan::create([
            'name' => $name,
            'desc' => $desc,
            'groupID' => $groupID,
            'code' => $code,
            'admin' => $admin,
            'date' => $date,
            'time' => $time,
            'budget' => $budget
        ]);

        Planmap::create([
            'user' => Auth::user()->name,
            'code' => $code,
            'admin' => Auth::user()->name,
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

    public function joinPlan(Request $request){
        if(Plan::where('code', $request->code)->count() != 0){
            $plan = Plan::where('code', $request->code)->first();
            Planmap::create([
                'user'=> $request->user,
                'code'=> $request->code,
                'admin'=> $plan->admin
            ]);
            return($plan);
        }
        else{
            return 404;
        }
    }

    public function getPlans(Request $request){
        $plans = Planmap::where('user', Auth::user()->name)->get();
        $p = [];

        foreach($plans as $plan){
            $a = Plan::where('code', $plan->code)->first();
            array_push($p, $a);
        }

        if(Planmap::where('opinion', 0)->count() != 0){
            $code = Planmap::where('opinion', 0)->first()->code;
            $planop = Plan::where('code', $code)->first();
        }
        else{
            $planop = [];
        }

        return [$p, $planop];
    }
}
