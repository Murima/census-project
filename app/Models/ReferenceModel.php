<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceModel extends Model
{
    //
    protected $table='references';
    protected $primaryKey ='status_id';
    public $timestamps = false;
}
