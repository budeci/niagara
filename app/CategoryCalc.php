<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use Request;
use File;
class CategoryCalc extends Repository
{
    use HasTranslations,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = CategoryCalcTranslation::class;

    /**
     * @var string
     */
    protected $table = 'categories_calc';

    /**
     * @var array
     */

    protected $fillable = ['active','image'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','description','meta_title','meta_description','meta_keyword','language_id','category_calc_id'];

    public function getImageAttribute($value)
    {
        //add full path to image
      if (!empty($value)) {
        return str_replace('\\', '/', $value);
      }
    }
  
    public function delete(){
        if($this->attributes['image']){
            $file = $this->attributes['image'];
            if(File::exists($file)){
                \File::delete($file);
            }
        }
        parent::delete();
    }

    public function food()
    {
        return $this->hasMany(Calc::class);
    }
}

