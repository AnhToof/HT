<?php

namespace App\Http\Controllers;

use App\BPDiagnose;
use App\BPNutrition;
use Illuminate\Http\Request;

class BPNutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nutritions = BPNutrition::paginate(7);
        $diagnoses = BPDiagnose::pluck('id');
        return view('bpdata.nutrition', compact('nutritions', 'diagnoses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $nutrition = new BPNutrition;
        $nutrition->diagnose_id = $request->diagnose_id;
        $nutrition->nutrition = $request->nutrition;
        $nutrition->save();
        $request->session()->flash('alert-success', 'Đã tạo chế độ dinh dưỡng thành công');

        return redirect('bpnutrition');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        BPNutrition::where('id', $id)->update([
            'diagnose_id' => $request->diagnose_id,
            'nutrition' => $request->nutrition
        ]);
        $request->session()->flash('alert-success', 'Đã sửa chế độ dinh dưỡng thành công');

        return redirect('bpnutrition');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        BPNutrition::where('id', $id)->delete();
        $request->session()->flash('alert-success', 'Đã xóa chế độ dinh dưỡng thành công');

        return redirect('bpnutrition');
    }
}
