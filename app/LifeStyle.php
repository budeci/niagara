<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use App\Libraries\Presenterable\Presenterable;
use App\Libraries\Presenterable\Presenters\MainPresenter;
use Request;

class LifeStyle extends Repository
{
    use HasTranslations, ActivateableTrait, Presenterable;

    protected $presenter = MainPresenter::class;

    /**
     * @var
     */
    public $translationModel = LifeStyleTranslation::class;

    /**
     * @var array
     */

    /**
     * @var string
     */
    protected $table = 'lifestyle';

    /**
     * @var array
     */

    protected $fillable = ['image','active','view_count'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','slug','body','meta_title','meta_description','meta_keyword'];

}
