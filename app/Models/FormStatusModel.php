<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormStatusModel extends Model
{
    //
    public $timestamps = false;
    protected $table= 'form_status';
    protected $primaryKey = 'status_id';
}
