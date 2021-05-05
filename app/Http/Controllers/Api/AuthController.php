<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 */
class AuthController extends Controller
{
    /**
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function login(AuthRequest $request)
    {
        try {
            $login_data = $request->all();

            if (Auth::attempt(['email' => $login_data['email'], 'password' => $login_data['password']])) {
                $user  = Auth::user();
                $token = $user->createToken('passport-demo')->accessToken;

                return customResponse(true, 'Login successfully', [
                    'user'         => $user,
                    'access_token' => $token
                ]);
            }
            return customResponse(false, 'Invalid credentials');
        } catch (Exception $e) {
            return customResponse(false, $e->getMessage());
        }
    }

    public function profile()
    {
        try {
            return customResponse(true, 'Profile has been retrieve successfully', ['user' => Auth::user()]);
        } catch (Exception $e) {
            return customResponse(false, $e->getMessage());
        }
    }
}
