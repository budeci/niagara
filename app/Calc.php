<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Libraries\Presenterable\Presenterable;
use App\Libraries\Presenterable\Presenters\MainPresenter;
use App\Traits\ActivateableTrait;
use App\Traits\HasImages;
use Request;
use File;
class Calc extends Repository
{
    use HasTranslations,Presenterable, HasImages ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = CalcTranslation::class;

    protected $presenter = MainPresenter::class;

    /**
     * @var string
     */
    protected $table = 'calc';

    /**
     * @var array
     */

    protected $fillable = ['active','image','calories','weight','category_calc_id'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','body','meta_title','meta_description','meta_keyword','language_id'];
    
    public function getImageAttribute($value)
    {
        //add full path to image
      if (!empty($value)) {
        return str_replace('\\', '/', $value);
      }
    }
    public function categoryCalc()
    {
        return $this->belongsTo(categoryCalc::class);
    }

    public function delete(){
        if($this->attributes['image']){
            $file = $this->attributes['image'];
            if(File::exists(public_path($file))){
                \File::delete(public_path($file));
                $medium = explode('.', $file);
                $mediumFile = $medium[0].'_medium.'.$medium[1];
                if(File::exists(public_path($mediumFile))){
                    \File::delete(public_path($mediumFile));
                }
            }
        }
        parent::delete();
    }
}
