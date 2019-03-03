<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leaveType extends Model
{
    public $table = "leave_types";
    public $fillable = ['name'];
}
