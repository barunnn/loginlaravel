<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class StudentController extends Controller
{
    public function register(Request $request)
    {
        // Validation rules for student data
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:students,email',
            'password' => 'required|string|min:6'
        ];


        $password = Hash::make($request->password);
        $request['password'] = $password;

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 422);
        }

        // Create a new student instance
        $student = User::create($request->all());

        // Return success message (optional)
        return Response::json([
            'message' => 'Student registered successfully!'
        ], 201);
    }
    public function login(Request $request)
    {
        // Validation rules for login credentials
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 422);
        }


        // Attempt login using email and password
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Login successful
            // You can generate a token here or use Laravel Sanctum (optional)

            return Response::json([
                'message' => 'Login successful!',

            ], 200);
        }

        // Login failed
        return Response::json([
            'message' => 'Invalid login credentials'
        ], 401);
    }
}
