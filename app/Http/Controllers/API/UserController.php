<?php

namespace App\Http\Controllers\API;

use App\Helpers\GenerateAccessToken;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Training;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $request)
    {
        //return $request->all();
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token['token'] = GenerateAccessToken::createAccesstoken($user);
            return Response::apiSuccessResponse(200, 'Login success', $token);
        }
        return Response::apiErrorResponse(403, 'Login not success');

    }

    public function createTraining(Request $request)
    {
        $attributes = $request->all();
        Training::create($attributes+ ['user_id' => auth()->id()]);
    }

    public function search(Request $request)
    {
       
        $attributes = $request->all();
        $date=$request->date;
        $start_time=$request->start_time;
        $end_time=$request->end_time;
      
        $result=Training::where('date',$date)
                    ->where('start_time','<=', $start_time)
                    ->where('end_time','>=',$end_time)
                    ->get();
                    return $result;

    }
}
