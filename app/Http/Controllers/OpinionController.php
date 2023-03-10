<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use App\Models\Planmap;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Auth;

class OpinionController extends Controller
{
    public function changeOp(Request $request){
        Opinion::create([
            'user' => Auth::user()->name,
            'code' => $request->code,
            'budget' => $request->budget
        ]);

        $plan = Planmap::where('code', $request->code)->first();
        $plan->opinion = 1;
        $plan->save();
        
        return 200;
    }

    public function getSpot(Request $request){
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $opinion = Opinion::where('code', $request->code)->get();
        $budget = [];
        foreach($opinion as $op){
            array_push($budget, $op->budget);
        }
        
        $rbudget = min($budget);

        $response = Http::withHeaders([
            'x-ms-client-id'=> '00f0e1d7-1c1b-4128-b907-08a38ec88dac',
            'subscription-key' => 'enMjO7MlvKnvrXpgDQKTvc5IYFvjgbnpaylIp0RxBuw'
        ])->get('https://atlas.microsoft.com/search/poi/category/json?api-version=1.0&lat='.$latitude.'&lon='.$longitude.'&query=restaurants&limit=40')->json();
        
        $datas = $response['results'];
        $a = [];

        foreach($datas as $data){
            if(count($a) >= 5){
                break;
            }
            else{
                if(DB::table('restaurants')->where('name', $data['poi']['name'])->count() == 0){
                    continue;
                }
                else{
                    $r = DB::table('restaurants')->where('name', $data['poi']['name'])->first();
                    if($r->price <= $rbudget){
                        array_push($a, $r);
                    }
                }
            }
        }

        return($a);

    }
}
