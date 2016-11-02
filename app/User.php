<?php

namespace App;

use Keyhunter\Administrator\AuthRepository as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar_url', 'account_type', 'active', 'sns_acc_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function scopeAdmin($query){
        if ($this->role_id == $this->getRoleAdmin()->id) {
            return true;
        }
        return false;
        // $this->where()->first();
    }

    private function getRoleAdmin(){
        return Role::whereName('admin')->first();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
