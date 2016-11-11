<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use Request;
use File;
class BeautyCategory extends Repository
{
    use HasTranslations,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = BeautyCategoryTranslation::class;

    /**
     * @var string
     */
    protected $table = 'beautycategory';

    /**
     * @var array
     */

    protected $fillable = ['active','view_count'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','slug','body','meta_title','meta_description','meta_keyword'];



}
