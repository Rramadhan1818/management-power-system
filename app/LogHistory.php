<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogHistory extends Model
{
    protected $table =  'log_history';

    protected $fillable = [
        'id_log_history', 'id_pmmodule', 'intOutputVoltage', 'intOutputCurrent', 'intOutputPower', 'intOutputPowerTotal', 'created_at', 'updated_at'
    ];
}
