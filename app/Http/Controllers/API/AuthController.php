<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Score;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => $request->password, // In production, use Hash::make()
        ]);

        return response()->json(['status' => 'success', 'message' => 'اطلاعات با موفقیت ذخیره شد.']);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->password !== $request->password) {
            return response()->json(['status' => 'error', 'message' => 'ایمیل یا رمز عبور اشتباه است']);
        }

        $score = Score::where('email', $user->email)->first();

        if ($score) {
            return response()->json([
                'status' => 'success',
                'message' => 'ورود موفق',
                'name' => $user->name,
                'surname' => $user->surname,
                'email' => $user->email,
                'score' => $score->score,
            ]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'نمره یافت نشد']);
        }
    }
}