<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Check if the user is a admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin == 1;
    }

    /**
     * Check if the user is a support
     *
     * @return bool
     */
    public function isSupport()
    {
        return $this->group == "support";
    }

    /**
     * Check if the user is a front-end
     *
     * @return bool
     */
    public function isFrontEnd()
    {
        return $this->group == "front-end";
    }

    /**
     * Check if the user is a back-end
     *
     * @return bool
     */
    public function isBackEnd()
    {
        return $this->group == "back-end";
    }

    /**
     *
     */
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    /**
     * Check if the user owns the model
     *
     * @return bool
     */
    public function owns(Model $model)
    {
        return $model->user_id == $this->id;
    }
}
