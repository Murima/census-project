<?php

namespace App\Models\census_forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HouseholdConditions extends Model
{
    //
    protected $table = 'household_amenities_conditions';
    public $timestamps = false;

    public function countTenureStatus(){

        $q=DB::raw("SELECT household_estate, tenure_status
FROM information_for_all JOIN household_amenities_conditions 
on (information_for_all.head_id= household_amenities_conditions.head_id)");
        $data=DB::select($q);

        return $data;
    }
}
