<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table =  'pmmodule';
    protected $fillable = ['id_pmmodule', 'txtModuleName', 'id_locater', 'bitActive', 'txtInsertedBy', 'txtUpdatedBy', 'created_at', 'updated_at'];
}
