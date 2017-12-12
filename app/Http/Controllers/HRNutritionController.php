<?php

namespace App\Http\Controllers;

use App\HRDiagnose;
use App\HRNutrition;
use Illuminate\Http\Request;

class HRNutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nutritions = HRNutrition::paginate(7);
        $diagnoses = HRDiagnose::pluck('id');
        return view('hrdata.nutrition', compact('nutritions', 'diagnoses'));
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
        $nutrition = new HRNutrition;
        $nutrition->diagnose_id = $request->diagnose_id;
        $nutrition->nutrition = $request->nutrition;
        $nutrition->save();
        $request->session()->flash('alert-success', 'Đã tạo chế độ dinh dưỡng thành công');
        return redirect('hrnutrition');
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
        HRNutrition::where('id', $id)->update([
            'diagnose_id' => $request->diagnose_id,
            'nutrition' => $request->nutrition
        ]);
        $request->session()->flash('alert-success', 'Đã sửa chế độ dinh dưỡng thành công');
        return redirect('hrnutrition');
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
        HRNutrition::where('id', $id)->delete();
        $request->session()->flash('alert-success', 'Đã xóa chế độ dinh dưỡng thành công');
        return redirect('hrnutrition');
    }
}
