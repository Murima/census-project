<?php

namespace App\Models\census_forms;

use Illuminate\Database\Eloquent\Model;

class PersonsWithDisabilities extends Model
{
    //
    protected $table='persons_with_disability';
    public $timestamps = false;

    public  function countDisability(){

        $visual=PersonsWithDisabilities::where('type_of_disability', 'Visual')->get();
        $mental=PersonsWithDisabilities::where('type_of_disability', 'Mental')->get();
        $hearing=PersonsWithDisabilities::where('type_of_disability', 'Hearing')->get();
        $physical=PersonsWithDisabilities::where('type_of_disability', 'Physical')->get();

        $m= $mental->count();
        $v= $visual->count();
        $h= $hearing->count();
        $p= $physical->count();


    }
}
