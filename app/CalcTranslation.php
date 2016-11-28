<?php
namespace App;
use App\Libraries\TranslatableModel;
class CalcTranslation extends TranslatableModel 
{

    public $timestamps  = false;
    protected $table    = 'calc_translations';
    protected $fillable = ['name','body','meta_title','meta_description','meta_keyword','language_id'];
}