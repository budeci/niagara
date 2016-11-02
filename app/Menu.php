<?php

namespace App;
use Keyhunter\Administrator\Repository;

class Menu extends Repository
{
    /**
     * @var string
     */
    protected $table = 'menu';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
