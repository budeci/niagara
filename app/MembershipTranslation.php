<?php
namespace App;
use App\Libraries\TranslatableModel;
class MembershipTranslation extends TranslatableModel 
{
    public $timestamps  = false;
    protected $table    = 'membership_translations';
    protected $fillable = ['name','body','language_id','membership_id'];
}
