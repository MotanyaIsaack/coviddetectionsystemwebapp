<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Prediction;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(): \Illuminate\Http\JsonResponse
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['user_id'] = $user->id;
            $success['first_name'] = $user->first_name;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] =  Hash::make($input['password']);
        $input['role_id'] = 2;
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['user_id'] = $user->id;
        $success['first_name'] = $user->first_name;
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function record_prediction(Request $request): \Illuminate\Http\JsonResponse
    {
        $insert_data = [
            'user_id'=>Auth::user()->id,
            'prediction'=>$request->prediction,
            'x_ray_image_name'=>$request->x_ray_image_name,
        ];

        $is_recorded = Prediction::create($insert_data);
        return ($is_recorded ? response()->json(['ok' => true, 'msg' => "Prediction inserted succesfully"]):
            response()->json(['ok' => false, 'msg' => "Prediction was not inserted successfully. Please try again"]));

    }
}
