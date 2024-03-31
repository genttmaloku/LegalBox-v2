<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lawyer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LawyerAuthController extends Controller
{
    public function register(Request $request) {
        try {
            $fields = $request->validate([
                'name' => 'required|regex:/^[A-Za-z]+$/',
                'surname' => 'required|regex:/^[A-Za-z]+$/',
                'username' => 'required|alpha_num|unique:lawyers',
                'email' => 'required|string|unique:lawyers,email',
                'password' => 'required|min:8'
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }

        $lawyer = Lawyer::create([
            'name' => $fields['name'],
            'surname' => $fields['surname'],
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $lawyer->createToken('myapptoken')->plainTextToken;

        $response = [
            'lawyer' => $lawyer,
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    public function login(Request $request) {
        try {
            $fields = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string'
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }

        $lawyer = Lawyer::where('email', $fields['email'])->first();

        if (!$lawyer || !Hash::check($fields['password'], $lawyer->password)) {
            return response()->json(['error' => 'Bad creds'], 401);
        }

        $token = $lawyer->createToken('myapptoken')->plainTextToken;

        $response = [
            'lawyer' => $lawyer,
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}