<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use Request;

class Offert extends Repository
{
    use HasTranslations ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = OffertTranslation::class;

    /**
     * @var string
     */
    protected $table = 'offert';

    /**
     * @var array
     */

    protected $fillable = ['image','active','view_count','public_date','expire_date'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','slug','body','meta_title','meta_description','meta_keyword'];

}
