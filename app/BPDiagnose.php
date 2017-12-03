<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BPDiagnose extends Model
{
    //
    protected $table = 'b_p_diagnoses';

    protected $fillable = [
        'diagnose',
    ];

    public function bpindex()
    {
        return $this->hasMany('App\BPIndex');
    }

    public function bpnutrition()
    {
        return $this->hasMany('App\BPNutrition');
    }

}
