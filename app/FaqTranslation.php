<?php
namespace App;
use App\Libraries\TranslatableModel;

class FaqTranslation extends TranslatableModel
{
    /**
     * @var string
     */
    public $timestamps = false;

    protected $table = 'faq_translations';

    protected $fillable = ['name','body','meta_title','meta_description','meta_keyword','language_id'];
    /**
     * @var array
     */
}