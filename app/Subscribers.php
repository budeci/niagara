<?php

namespace App;

use Keyhunter\Administrator\Repository as Eloquent;

/**
 * Class Subscribers
 * @package App
 */
class Subscribers extends Eloquent
{

    /**
     * @var array
     */
    protected $fillable = ['email', 'type'];

    /**
     * @var string
     */
    protected $table = 'subscribe';
}
