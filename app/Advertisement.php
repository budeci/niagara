<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use Request;

class Advertisement extends Repository
{
    use HasTranslations ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = AdvertisementTranslation::class;

    /**
     * @var string
     */
    protected $table = 'advertisement';

    /**
     * @var array
     */

    protected $fillable = ['active','view_count'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','slug','opportunities','inside_club','sponsors','meta_title','meta_description','meta_keyword'];

}
