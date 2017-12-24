<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = ['name', 'group', 'status', 'user_id', 'description'];
    /**
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
