<?php
namespace App;
use App\Libraries\TranslatableModel;
class ResultCaloriesTranslation extends TranslatableModel 
{

    public $timestamps  = false;
    protected $table    = 'result_calories_translations';
    protected $fillable = ['name','body','result_calories_id','language_id'];
}