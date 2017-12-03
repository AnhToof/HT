<?php

namespace App\Http\Controllers;

use App\HRDiagnose;
use App\HRIndex;
use Illuminate\Http\Request;

class HRIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $indices = HRIndex::paginate(9);
        $diagnoses = HRDiagnose::pluck('id');
        return view('hrdata.index', compact('indices', 'diagnoses'));
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
        $index = new HRIndex;
        $index->from_index = $request->from_index;
        $index->to_index = $request->to_index;
        $index->from_age = $request->from_age;
        $index->to_age = $request->to_age;
        $index->sex = $request->sex;
        $index->diagnose_id = $request->diagnose_id;
        $index->save();
        $request->session()->flash('alert-success', 'Đã tạo chỉ số thành công');
        return redirect('hrindex');

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
        HRIndex::where('id', $id)->update([
            'from_index' => $request->from_index,
            'to_index' => $request->to_index,
            'from_age' => $request->from_age,
            'to_age' => $request->to_age,
            'sex' => $request->sex,
            'diagnose_id' => $request->diagnose_id
        ]);
        $request->session()->flash('alert-success', 'Đã sửa chỉ số thành công');
        return redirect('hrindex');
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
        HRIndex::where('id', $id)->delete();
        $request->session()->flash('alert-success', 'Đã xóa chỉ số thành công');
        return redirect('hrindex');
    }
}
