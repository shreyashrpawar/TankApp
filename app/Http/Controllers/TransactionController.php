<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Requests;
use Illuminate\Support\Facades\Log;


class TransactionController extends Controller
{

    public function index(Request $request) {
        $user=$request->user();
        if($user['name']=="admin"){
            $request = Requests::all();
            return $request;
        }
        return response()->json([
            'message' => 'Unauthorized user',
        ], 401);
    }
    public function show(string $id)
    {
        $requests = Requests::where('GST_number', $id)
        ->select('transactionType','hashTag', 'points', 'date')
        ->get();
        Log::info($requests);

        return $requests;
    }
    public function form(Request $request) {
        $user=$request->user();
        if($user['name']=="admin"){
            $users = User::all();
            return $users;
        }
        return response()->json([
            'message' => 'Unauthorized user',
        ], 401);
    }
    public function store(Request $request) {
        $validated = $request->validate([
          'GST_number' => 'required|exists:users,GST_no',
          'transactionType' => 'required|string|min:0|max:100',
          'hashTag' => 'required|string|min:0|max:1000',
          'points' => 'required|integer',
          'date'=> 'required|date'
        ]);
        Log::info($validated);
        Requests::create($validated);
  
        return response()->json([
            'message' => 'Request created',
        ], 202);
    }
}

