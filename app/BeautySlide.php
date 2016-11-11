<?php
namespace App;
use Keyhunter\Administrator\Repository;
use App\Traits\ActivateableTrait;
use Request;
use File;
class BeautySlide extends Repository
{
    use ActivateableTrait;


    protected $table = 'beautyslide';

    /**
     * @var array
     */

    protected $fillable = ['name','active','image','link'];

}


