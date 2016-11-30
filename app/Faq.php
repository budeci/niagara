<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use Request;

class Faq extends Repository
{
    use HasTranslations, ActivateableTrait;

    /**
     * @var
     */
    public $translationModel = FaqTranslation::class;

    /**
     * @var array
     */

    /**
     * @var string
     */
    protected $table = 'faq';

    /**
     * @var array
     */

    protected $fillable = ['active'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','body','meta_title','meta_description','meta_keyword'];

}
