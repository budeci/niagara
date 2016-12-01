<?php
namespace App;
use App\Libraries\TranslatableModel;
class SlidesTranslation extends TranslatableModel 
{

    public $timestamps  = false;
    protected $table    = 'slides_translations';
    protected $fillable = ['name','label_photo','language_id','slides_id'];
}