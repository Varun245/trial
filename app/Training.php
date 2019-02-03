<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'trainer_name', 'topic_name', 'description','date','start_time','end_time','room_id','user_id'
    ];
    

    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\TrainingUser');
    }
}
