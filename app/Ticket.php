<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = ['name', 'status', 'website', 'completion_date', 'group', 'user_id', 'description'];
    /**
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
