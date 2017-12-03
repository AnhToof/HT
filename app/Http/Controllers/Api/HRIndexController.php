<?php

namespace App\Http\Controllers\Api;

use App\HRDiagnose;
use App\HRIndex;
use App\HRNutrition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $indices = HRIndex::all();
        $data = array();
        $i = 0;
        foreach ($indices as $index)
        {
            $temp = HRIndex::find($index->id);
            $diagnose_id = $temp->diagnose_id;

            $diagnoses = array(
                'id' => $temp->id,
                'from_index' => $temp->from_index,
                'to_index' => $temp->to_index,
                'from_age' => $temp->from_age,
                'to_age' => $temp->to_age,
                'sex' => $temp->sex,
                'diagnose_id' => $diagnose_id,
                'diagnose' => HRDiagnose::find($diagnose_id)->diagnose,
                'nutrition' => HRNutrition::find($diagnose_id)['nutrition']
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
