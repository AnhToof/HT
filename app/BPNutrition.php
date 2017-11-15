<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BPNutrition extends Model
{
    //
    protected $table = 'b_p_nutritions';

    protected $fillable = [
        'nutrition'
    ];
    public function bpnutrition()
    {
        return $this->belongsTo('App\BPDiagnose');
    }
}
