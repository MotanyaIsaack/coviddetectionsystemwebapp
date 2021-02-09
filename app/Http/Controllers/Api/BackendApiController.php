<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Prediction;
use Carbon\Carbon;

class BackendApiController extends Controller
{
    //get prediction
    public function get_predictions(){
        $user_id = auth()->id();
        $predictions = Prediction::with('users')->where('user_id',$user_id)->get();
        $number = 1;
        foreach ($predictions as $key=>$value) {
            $predictions[$key]['number'] = $number++;
            $predictions[$key]['prediction_time'] = Carbon::parse($predictions[$key]['created_at'])->format('d.m.Y');
        }
        return response()->json($predictions);
    }
}
