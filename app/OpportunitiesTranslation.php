<?php
namespace App;
use App\Libraries\TranslatableModel;
class OpportunitiesTranslation extends TranslatableModel
{
    public $timestamps = false;
    protected $table = 'opportunities_translations';
    protected $fillable = ['name', 'body','opportunities_id','language_id'];
}




