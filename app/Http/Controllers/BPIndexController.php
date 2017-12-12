<?php

namespace App\Http\Controllers;

use App\BPDiagnose;
use App\BPIndex;
use Illuminate\Http\Request;

class BPIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indices = BPIndex::paginate(7);
        $diagnoses = BPDiagnose::pluck('id');

        return view('bpdata.index', compact('indices', 'diagnoses'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $index = new BPIndex;
        $index->from_systolic = $request->from_systolic;
        $index->to_systolic = $request->to_systolic;
        $index->operator = $request->operator;
        $index->from_diastolic = $request->from_diastolic;
        $index->to_diastolic = $request->to_diastolic;
        $index->diagnose_id = $request->diagnose_id;
        $index->save();
        $request->session()->flash('alert-success', 'Đã tạo chỉ số thành công');
        return redirect('bpindex');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        BPIndex::where('id', $id)->update([
            'from_systolic' => $request->from_systolic,
            'to_systolic' => $request->to_systolic,
            'operator' => $request->operator,
            'from_diastolic' => $request->from_diastolic,
            'to_diastolic' => $request->to_diastolic,
            'diagnose_id' => $request->diagnose_id
        ]);
        $request->session()->flash('alert-success', 'Đã sửa chỉ số thành công');
        return redirect('bpindex');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        BPIndex::where('id', $id)->delete();
        $request->session()->flash('alert-success', 'Đã xóa chỉ số thành công');
        return redirect('bpindex');
    }
}
