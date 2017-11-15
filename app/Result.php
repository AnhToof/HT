<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //
    protected $table = 'results';

    protected $fillable = [
        'heart_rate',
        'blood_pressure',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
