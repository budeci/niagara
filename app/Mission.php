<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use Request;

class Mission extends Repository
{
    use HasTranslations, ActivateableTrait;

    /**
     * @var
     */
    public $translationModel = MissionTranslation::class;

    /**
     * @var array
     */

    /**
     * @var string
     */
    protected $table = 'mission';

    /**
     * @var array
     */

    protected $fillable = ['image','active'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','slug','body','left_block','right_block','image_title','image_list','meta_title','meta_description','meta_keyword'];

}
