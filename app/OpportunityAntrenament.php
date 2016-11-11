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
    protected $table = 'opportunity_antrenament';

    /**
     * @var array
     */

    protected $fillable = ['opportunities','active','image1','image2','image3','category_type','category_id'];

    /**
     * @var array
     */
    public $translatedAttributes = ['annotation1','annotation2','annotation3','name','slug','body','meta_title','meta_description','meta_keyword'];



    public function delete(){
        if($this->attributes['image1']){
            $file1 = $this->attributes['image1'];
            $file2 = $this->attributes['image2'];
            $file3 = $this->attributes['image3'];
            if(File::exists(public_path($file1))){
                \File::delete(public_path($file1));
                \File::delete(public_path($file2));
                \File::delete(public_path($file3));
                $dir = explode("\\", $file1);
                rmdir(public_path($dir[0]));
            }
        }
        parent::delete();
    }
}
