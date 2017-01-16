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
class Program extends Repository
{
    use HasTranslations,Presenterable, HasImages ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = ProgramTranslation::class;

    protected $presenter = MainPresenter::class;

    /**
     * @var string
     */
    protected $table = 'program';

    /**
     * @var array
     */

    protected $fillable = ['active','image','color'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','body','hall','slug','program_id','language_id'];
    
    public function getImageAttribute($value)
    {
        //add full path to image
      if (!empty($value)) {
        return str_replace('\\', '/', $value);
      }
    }
    public function schedule()
    {
        return $this->belongsToMany(Schedule::class);
    }
    public function delete(){
        if($this->attributes['image']){
            $file = $this->attributes['image'];
            if(File::exists(public_path($file))){
                \File::delete(public_path($file));
            }
        }
        parent::delete();
    }
}

