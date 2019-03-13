<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trainingTopics extends Model
{
    public $table = "training_topics";
    public $fillable = ['name'];
}
