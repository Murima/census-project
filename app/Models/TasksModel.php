<?php
namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

class TasksModel extends Model
{
    //
    public $timestamps = false;
    protected $table= 'task_list';
    protected $primaryKey = 'task_id';


 

}
