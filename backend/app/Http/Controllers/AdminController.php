<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Admin;
use Illuminate\Auth\Access\AuthorizationException;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin-api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
    */
    public function login(Request $request){
    	if ($token = auth('admin-api')->attempt(request()->only('email', 'password'))) {
            return response()->json([
                'token' => $token,
                'message' => "Login successful"
            ]);
        }

        throw new AuthorizationException("Invalid Credentials");
    }

    /**
     * Sign up.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $req = Validator::make($request->all(), [
            'nama' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:admin',
            'password' => 'required|string|confirmed|min:6',
            'TipeID' => 'required|numeric',
            'isActive' => 'numeric',
        ]);

        if($req->fails()){
            return response()->json($req->errors()->toJson(), 400);
        }

        $user = Admin::create(array_merge(
                    $req->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'message' => 'User signed up',
            'user' => $user
        ], 201);
    }

    /**
     * Sign out
    */
    public function signout() {
        auth()->logout();
        return response()->json(['message' => 'User loged out']);
    }

    /**
     * Token refresh
    */
    public function refresh() {
        return $this->generateToken(auth()->refresh());
    }

    /**
     * User
    */
    public function user() {
        return response()->json(auth()->user());
    }

    /**
     * Generate token
    */
    protected function generateToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
