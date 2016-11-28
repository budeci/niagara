<?php
namespace App;
use App\Libraries\TranslatableModel;
class CategoryCalcTranslation extends TranslatableModel
{

    public $timestamps = false;
    protected $table = 'categories_calc_translations';

    protected $fillable = ['name','description','meta_title','meta_description','meta_keyword','language_id','category_calc_id'];

}
