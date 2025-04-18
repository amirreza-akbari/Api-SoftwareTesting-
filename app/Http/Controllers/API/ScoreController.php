<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\Validator;

class ScoreController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'score' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 422);
        }

        Score::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'score' => $request->score,
        ]);

        return response('success');
    }

    public function topScores()
    {
        $users = Score::where('score', '>', 15)
                      ->orderByDesc('score')
                      ->get(['name', 'surname', 'email', 'score']);

        return response()->json($users);
    }
}