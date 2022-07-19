<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locater extends Model
{
    protected $table =  'locater';

    protected $fillable = [
        'id_locater', 'txtLocaterName', 'bitActive', 'txtInsertedBy', 'txtUpdatedBy', 'created_at', 'updated_at'
    ];
}
