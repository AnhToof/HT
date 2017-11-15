<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HRDiagnose extends Model
{
    //

    protected $table = 'h_r_diagnoses';

    protected $fillable = [
        'diagnose',
    ];
    public function hrindex()
    {
        return $this->hasMany('App\HRIndex');
    }
    public function hrnutrition()
    {
        return $this->hasMany('App\HRNutrition');
    }


}
