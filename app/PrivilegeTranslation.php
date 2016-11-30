<?php
namespace App;
use App\Libraries\TranslatableModel;
class PrivilegeTranslation extends TranslatableModel 
{

    public $timestamps  = false;
    protected $table    = 'privilege_translations';
    protected $fillable = ['name','body','privilege_id','language_id'];
}
