<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HRNutrition extends Model
{
    //
    protected $table = 'h_r_nutritions';

    protected $fillable = [
        'nutrition'
    ];

    public function hrnutrition()
    {
        return $this->belongsTo('App\HRDiagnose');
    }
}
