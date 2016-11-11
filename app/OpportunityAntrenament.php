<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Libraries\Presenterable\Presenterable;
use App\Libraries\Presenterable\Presenters\TrainingPresenter;
use App\Traits\ActivateableTrait;
use App\Traits\HasImages;
use Request;
use File;
class OpportunityAntrenament extends Repository
{
    use HasTranslations,Presenterable, HasImages ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = OpportunityAntrenamentTranslation::class;

    protected $presenter = TrainingPresenter::class;

    /**
     * @var string
     */
    protected $table = 'opportunity_antrenament_translation';

    /**
     * @var array
     */

    protected $fillable = ['opportunities','active','image1','image2','image3','category_id'];

    /**
     * @var array
     */
    public $translatedAttributes = ['annotation1','annotation2','annotation3','name','slug','body','meta_title','meta_description','meta_keyword'];



    public function delete(){
        if($this->attributes['image']){
            $file = $this->attributes['image'];
            if(File::exists($file)){
                \File::delete($file);
            }
        }
        parent::delete();
    }
}
