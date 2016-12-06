<?php
namespace App;
use App\Libraries\TranslatableModel;
class ScheduleTranslation extends TranslatableModel 
{

    public $timestamps  = false;
    protected $table    = 'schedule_translations';
    protected $fillable = ['name','body','hall','schedule_id','language_id'];
}
