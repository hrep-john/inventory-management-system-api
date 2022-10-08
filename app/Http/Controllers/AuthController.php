<?php

namespace App\Http\Controllers;

use App\Helpers\ApiErrorResponse;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\ApiResponder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
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
            'access_token' => $token, 
            'token_type' => $type
        ], Response::HTTP_OK);
    }
}
