<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ResultController extends Controller
{
    //
    public function index()
    {
        $results = Auth::user()->results()->orderBy('id', 'desc')->take(10)->get();

        return response()->json(['data' => $results], 200, [], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request)
    {
        $result = new Result;
        $result->user_id = Auth::user()->id;
        $result->heart_rate = $request->heart_rate;
        $result->blood_pressure = $request->blood_pressure;
        $result->save();
        return response()->json($result);
    }

    public function show($id)
    {
        $result = Auth::user()->results()->find($id);
        return response()->json($result);
    }
}
