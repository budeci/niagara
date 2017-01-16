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
class Schedule extends Repository
{
    protected $hour = [
        'hour',
    ];
    use HasTranslations,Presenterable, HasImages ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = ScheduleTranslation::class;

    protected $presenter = MainPresenter::class;

    /**
     * @var string
     */
    protected $table = 'schedule';

    /**
     * @var array
     */

    protected $fillable = ['active','image','trainer_id','hour','type','day_id'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','body','hall','schedule_id','language_id'];
    
    public function getImageAttribute($value)
    {
        //add full path to image
      if (!empty($value)) {
        return str_replace('\\', '/', $value);
      }
    }
    /*public function scheduleProgram()
    {
        return $this->hasMany(ScheduleProgram::class, 'id', 'program_id');
    }*/
    public function days()
    {
        return $this->hasOne(Day::class, 'id', 'day_id');
    }
    public function getProgram()
    {
        return $this->belongsToMany(Program::class, 'schedule_program', 'schedule_id', 'program_id');
    }
    public function program()
    {
        return $this->belongsToMany(Program::class, 'schedule_program', 'schedule_id', 'program_id');
    }
    public function getProgramAttribute($program)
    {
        return array_pluck($this->program()->get()->toArray(), 'id');
    }
    public function setProgramAttribute($program)
    {
        // перепрописываем отношения с таблицей категорий
        $this->program()->detach();
        if (!$program) return;
        if (!$this->exists) $this->save();
        $this->program()->attach($program);
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

