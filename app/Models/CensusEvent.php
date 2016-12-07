<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CensusEvent
 *
 * @property string $census_id
 * @property string $census_name
 * @property string $daterange
 * @property string $remember_token
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CensusEvent whereCensusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CensusEvent whereCensusName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CensusEvent whereDaterange($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CensusEvent whereRememberToken($value)
 * @mixin \Eloquent
 */
class CensusEvent extends Model
{
    //
    public $timestamps = false;
    //protected $table= 'census_events';

    public function getNumberofEvents(){

        $events = \DB::table('census_events')->count();
        return $events;
    }


}
