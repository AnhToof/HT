<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BPIndex extends Model
{
    //
    protected $table = 'b_p_indices';

    protected $fillable = [
        'from_systolic',
        'to_systolic',
        'operator',
        'from_diastolic',
        'to_diastolic'
    ];

    public function bpdiagnose()
    {
        return $this->belongsTo('App\BPDiagnose');
    }
}
