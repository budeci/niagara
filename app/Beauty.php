<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use App\Traits\HasImages;
use Request;
use File;


class Beauty extends Repository
{
    use HasTranslations, HasImages, ActivateableTrait;

    /**
     * @var MenuTranslations
     */

    public $translationModel = BeautyTranslation::class;
    /**
     * @var string
     */
    protected $table = 'beauty';

    /**
     * @var array
     */

    protected $fillable = ['active','image','category_id'];

    public $translatedAttributes = ['name','body','beauty_id'];

}


