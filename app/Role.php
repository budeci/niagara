<?php

namespace App;

use Keyhunter\Administrator\Repository as Eloquent;

class Role extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '*'
    ];

    protected $table = 'roles';
}
