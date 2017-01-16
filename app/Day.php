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
class Day extends Repository
{
    use HasTranslations,Presenterable, HasImages ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = DayTranslation::class;

    protected $presenter = MainPresenter::class;

    /**
     * @var string
     */
    protected $table = 'days';

    /**
     * @var array
     */

    protected $fillable = ['weekdaysShort','weekdays'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','day_id','language_id'];

    public function scheduleAdult()
    {
        return $this->hasMany(Schedule::class, 'day_id', 'id')->active()->where('type','adult')->orderBy('hour','asc');
    }
    public function scheduleKids()
    {
        return $this->hasMany(Schedule::class, 'day_id', 'id')->active()->where('type','kids')->orderBy('hour','asc');
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

