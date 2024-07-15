<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            foreach ($errors as $field => $messages) {
                $errors[$field] = $messages[0];
            }
            return $this->sendError("Validate error", $errors);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ];
        return $this->sendCreatedResponse("Registrasi berhasil dilakukan", $data);
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return $this->sendUnauthorized('Unauthorized');
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            'access_token' => $token,
            'token_type' => 'Bearer'
        ];
        return $this->sendCreatedResponse("Berhasil login", $data);
    }

    public function me()
    {
        return $this->sendResponse("Data user", Auth::user());
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return $this->sendResponse("Berhasil logout");
    }
}
