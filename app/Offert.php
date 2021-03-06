<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use App\Libraries\Presenterable\Presenterable;
use App\Libraries\Presenterable\Presenters\MainPresenter;
use Request;

class Offert extends Repository
{
    use HasTranslations, ActivateableTrait, Presenterable;

    /**
     * @var
     */
    public $translationModel = OffertTranslation::class;

    /**
     * @var
     */
    protected $presenter = MainPresenter::class;

    /**
     * @var array
     */
    protected $dates = [
        'public_date',
        'expire_date'
    ];

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
