<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use Request;

class Press extends Repository
{
    use HasTranslations ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = PressTranslation::class;

    /**
     * @var string
     */
    protected $table = 'press';

    /**
     * @var array
     */

    protected $fillable = ['category_id','active','view_count'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','slug','body','meta_title','meta_description','meta_keyword'];

}
