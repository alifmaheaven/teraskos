<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\SendForgetMail;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'  => 'required',
            'password'  => 'required',
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = array($fieldType => $request->username, 'password' => $request->password);

        //1 weeks or 1 hours
        $expiredToken = $request->is_remember == true ? 7 * 24 * 60 : 1 *60;

        if (! $token = auth()->setTTL($expiredToken)->attempt($credentials)) {
            return response()->json(['data' => '', 'message' => 'Maaf email dan password salah!'], 409);
        }

        return $this->respondWithToken($token);
    }

    public function loginGoogle(Request $request)
    {
        $token = $request->token;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.googleapis.com/oauth2/v1/userinfo',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        $value = array(
            'name'      => $response->name,
            'email'     => $response->email,
            'username'  => str_replace("@gmail.com", "", $response->email),
            'password'  => '',
            'first_login' => 0,
            'foto' => '',
            'is_active' => 1
        );

        $user = User::firstOrCreate(['email' => $response->email, ],$value);

        if (! $token = auth()->login($user)) {
            return response()->json(['data' => '', 'message' => 'Maaf email dan password salah!'], 200);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
                'name'      => 'required|string',
                'email'     => 'required|email|unique:users',
                'username'  => 'required|unique:users',
                'password'  => 'required|confirmed',
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }

        try {

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            $user->foto = '';
            $user->first_login = 1;
            $user->is_active = 0;
            $user->save();

            $userFindAfterSave = User::where('email', '=', $user->email)->firstOrFail();
            $userFindAfterSave->token = auth()->login($userFindAfterSave);

            \Mail::to($user->email)->send(new VerifyMail($userFindAfterSave));

            //return successful response
            return response()->json(['data' => $user, 'message' => 'success craeted, check your email!'], 201);

        } catch (\Exception $e) {
            // return error message
            return response()->json(['data' => '', 'message' => 'User Registration Failed!'], 409);
        }

    }

    public function verifyUser()
    {
        $user = auth()->user();
        $updateUser= User::find($user['id']);
        $updateUser->is_active = 1;
        $updateUser->save();
        auth()->logout();
        return response()->json(['data' => $user, 'message' => 'success verify user!'], 200);
    }

    public function sendRequestForget(Request $request)
    {
        $user = User::where('email', '=', $request->input('email'))->first();

        if (!(!!$user)) {
           return response()->json(['data' => '', 'message' => 'Not registered!'], 409);
        }

        $user->token = auth()->login($user);
        \Mail::to($user->email)->send(new SendForgetMail($user));

        return response()->json(['data' => $user, 'message' => 'success send to email!'], 200);
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password'  => 'required|confirmed',
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }

        $user = auth()->user();
        $updateUser= User::find($user['id']);
        $plainPassword = $request->input('password');
        $updateUser->password = app('hash')->make($plainPassword);
        $updateUser->is_active = 1;
        $updateUser->save();
        auth()->logout();
        return response()->json(['data' => $user, 'message' => 'success change password! please login again!'], 200);
    }

    public function changeProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name'      => 'required|string',
                'email'     => 'required|unique:users,email,'.auth()->user()->id,
                'username'  => 'required|unique:users,email,'.auth()->user()->id,
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }

        $user = auth()->user();
        $updateUser= User::find($user['id']);
        $updateUser->name = $request->input('name');
        $updateUser->email = $request->input('email');
        $updateUser->username = $request->input('username');
        $updateUser->foto = $request->input('foto');
        $updateUser->save();

        return response()->json(['data' => $user, 'message' => 'Success change profile!'], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(['data' => auth()->user(), 'message' => 'success get data'], 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['data' => '', 'message' => 'Successfully logged out'], 201);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json(
        ['data' => [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL()
        ],
        'message' => 'Login Berhasil!'], 200);
        //  response()->json();
    }
}
