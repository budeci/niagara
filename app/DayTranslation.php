<?php
namespace App;
use App\Libraries\TranslatableModel;
class DayTranslation extends TranslatableModel 
{

    public $timestamps  = false;
    protected $table    = 'days_translations';
    protected $fillable = ['name','language_id','day_id'];
}
