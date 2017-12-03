<?php

namespace App\Http\Controllers\Api;

use App\BPDiagnose;
use App\BPIndex;
use App\BPNutrition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BPIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $indices = BPIndex::all();
        $data = array();
        $i = 0;
        foreach ($indices as $index)
        {
            $temp = BPIndex::find($index->id);
            $diagnose_id = $temp->diagnose_id;

            $diagnoses = array(
                'id' => $temp->id,
                'from_systolic' => $temp->from_systolic,
                'to_systolic' => $temp->to_systolic,
                'operator' => $temp->operator,
                'from_diastolic' => $temp->from_diastolic,
                'to_diastolic' => $temp->to_diastolic,
                'diagnose_id' => $diagnose_id,
                'diagnose' => BPDiagnose::find($diagnose_id)->diagnose,
                'nutrition' => BPNutrition::find($diagnose_id)['nutrition']
            );
            $data[$i] = $diagnoses;
            $i++;
        }
        return Response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
