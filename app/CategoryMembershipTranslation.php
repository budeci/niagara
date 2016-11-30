<?php
namespace App;
use App\Libraries\TranslatableModel;
class CategoryMembershipTranslation extends TranslatableModel
{

    public $timestamps = false;
    protected $table = 'categories_membership_translations';

    protected $fillable = ['name','description','available','language_id','category_membership_id'];

}