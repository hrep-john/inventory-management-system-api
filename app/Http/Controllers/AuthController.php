<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\ApiResponder;
use App\Helpers\ApiErrorResponse;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    use ApiResponder;
    /**
     * Login to an existing user
     * @param LoginUser $request
     * @return Response
     */
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->all())) {
            $this->throwError(
                Lang::get('validation.invalid.user.id.password'), 
                NULL, 
                Response::HTTP_UNAUTHORIZED, 
                ApiErrorResponse::INVALID_CREDENTIALS_CODE
            );
        }

        $user = Auth::user();
        $token = $user->createToken('api_token')->plainTextToken;
        $type = 'Bearer';

        return $this->success([
            'user' => $user,
            'roles' => $user->roles->pluck('name'),
            'access_token' => $token, 
            'token_type' => $type
        ], Response::HTTP_OK);
    }

    /**
     * Revoke the current access token of the auth user
     *
     * @return Response
     */
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success(NULL, Response::HTTP_NO_CONTENT);
    }
}
