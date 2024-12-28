<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function login(Request $request)
    {

     $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {

        $user = $request->user();

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token,'user_id'=> $user->id]);
      }

      return response()->json(['error' => 'Failed to login'], 401);
    }

    public function register(Request $request)
    {

            $validator = Validator::make($request->all(),[
                'name' => 'required|string|min:2|max:25',
                'address' => 'required|string',
                'phone' => 'required|min:7|string',
                'email' => 'email|required|unique:users',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {
                return response(['errors'=>$validator->errors()->all()], 422);
            }

            User::create([
                'name' =>$request->name,
                'email'=>$request->email,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'password'=>bcrypt($request->password),
            ]);

            return response(['status'=>'تم تسجيل المستخدم بنجاح']);

    }


    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
