<?php

namespace App\Http\Controllers;

use App\BPIndex;
use App\BPNutrition;
use App\HRIndex;
use App\HRNutrition;
use App\Result;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approved = User::where('status', '=', '1')->count() - 1;
        $notapproved = User::where('status', '=', '0')->count();
        $userdata = Result::all()->count();
        $hrindex = HRIndex::all()->count();
        $bpindex = BPIndex::all()->count();
        $hrnutri = HRNutrition::all()->count();
        $bpnutri = BPNutrition::all()->count();
        $data = array(
            'approved' => $approved,
            'notapproved' => $notapproved,
            'userdata' => $userdata,
            'records' => $hrindex + $hrnutri + $bpindex + $bpnutri);

        return view('dashboard')->with($data);
    }
}
