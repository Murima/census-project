<?php

namespace App\Models\census_forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InformationAll extends Model
{
    //
    //protected $fillable = ['household_estate', 'houseNo', 'head_id','occupant'];
    protected $table = 'information_for_all';
    //public $timestamps = false;

    public  function getAgeRanges(){

        $data=DB::raw("select round(occupant_age / 10), count(occupant_age) 
           from information_for_all where occupant_age < 70 
           group by round(occupant_age / 10) 
           union select '70+', count(occupant_age) 
           from information_for_all 
           where occupant_age >= 70");

        return DB::select($data);

    }
}
