<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RejectionReason extends Model
{

    //
    protected  $primarykey = 'id';
    public $table= 'rejection_reasons';

    public function getReason($statusId, $reasonId){

        $form = ReferenceModel::where('status_id', $statusId)->get()->first();
        if ($form->previous_status="Accepted"){
            $reason =RejectionReason::find($reasonId);
            return $reason->reason;

        }
        else{
            $reason =AcceptReason::find($reasonId);
            return $reason->reason;
        }
    }
}
