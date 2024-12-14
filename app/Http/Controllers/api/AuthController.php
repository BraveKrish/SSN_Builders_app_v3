<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        // Validate incoming request
        $request->validate([
            "name" => 'required',
            "email" => "required|email|unique:users,email", // Ensure email is unique
            "password" => "required|min:8", // Minimum password length can be added for security
        ]);

        // Create user with the validated data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Create a token for the user
        $token = $user->createToken($request->email)->plainTextToken;

        // Send email verification notification
        // $user->sendEmailVerificationNotification();

        return response()->json([
            'token' => $token,
            'message' => 'Successfully Registered',
            'status' => true,
            'user' => new UserResource($user), // Return user resource
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($request->email)->plainTextToken;
            return response([
                'token' => $token,
                'message' => 'Logged in Successfully',
                'status' => true,
                'user' => new UserResource($user)
            ], 200);
        }

        return response([
            'message' => 'The provided Credintials was invalid',
            'status' => false,
        ], 401);
    }



    public function logged_user()
    {
        if (!auth()->check()) {
            return response([
                'message' => 'User not authenticated',
                'status' => false,
            ], 401); // Unauthorized
        }
        
        $logged_user = auth()->user();
        return response([
            'message' => 'Logged user data',
            'status' => true,
            'user' => new UserResource($logged_user),
        ], 200);
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $logged_user = auth()->user();
        if (Hash::check($request->old_password, $logged_user->password)) {
            $logged_user->password = Hash::make($request->password);
            $logged_user->save();
            return response([
                'message' => 'Passwords changed successfully',
                'status' => 'success',
            ], 200);
        } else {
            return response([
                'message' => 'Old Password donot match',
                'status' => false,
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logged out Successfully',
            'status' => true,
        ], 200);
    }

}
