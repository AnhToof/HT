<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HRIndex extends Model
{
    //
    protected $table = 'h_r_indices';

    protected $fillable = [
        'from_index',
        'to_index',
        'from_age',
        'to_age',
        'sex'
    ];

    public function hrdiagnose()
    {
        return $this->belongsTo('App\HRDiagnose');
    }
}
