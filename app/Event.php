<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    const TYPE_GLUCOSE_READING = 0;
    const TYPE_INSULIN_INJECTION = 1;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
