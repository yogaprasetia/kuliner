<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            return (new UserResource($user))->additional([
                'token' => $request->user()->createToken('api-kuliner')->plainTextToken,
            ]);
        } else {
            return response(['message' => 'Unauthorized'], 401);
        }
    }
}
