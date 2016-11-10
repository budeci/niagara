<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Libraries\Presenterable\Presenterable;
use App\Libraries\Presenterable\Presenters\EventPresenter;
use App\Traits\ActivateableTrait;
use App\Traits\HasImages;
use Request;
use File;
use Carbon\Carbon;
class Event extends Repository
{
     use HasTranslations, Presenterable, HasImages, ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    
    public $translationModel = EventTranslation::class;
    protected $presenter = EventPresenter::class;
    protected $dates = [
        'public_date',
        'expire_date'
      ];
    /**
     * @var string
     */
    protected $table = 'event';

    /**
     * @var array
     */

    protected $fillable = ['active','image','home_show','category_event_id','public_date','expire_date'];

    /**
     * @var array
     */

    public $translatedAttributes = ['name','slug','about','program','meta_title','meta_description','meta_keyword'];
    //public $imgPath  = 'upload/event/';

    public function scopePublished($query)
    {
        return $query->whereActive(1);
    }

    
/*    public function categoryEvent()
    {
        return $this->belongsTo(CategoryEvent::class);
    }*/
    /*public function setImageAttribute($value)
    {
        //remove file
        if (is_null($value) or $value == "") {

            $image = str_replace('\\', '/', $this->attributes['image']);
            if (File::exists($image)) {
                File::delete($image);
            }

            //clean field
            $this->attributes['image'] = null;

        } else { //add file

            //get name from path
            $imageName = last(explode('/', str_replace('\\', '/', $value)));
            if (Request::hasFile('image')) {
                $extension = Request::file('image')->getClientOriginalExtension();
            }else{
                $extension = File::extension($imageName);
            }
            
            
            $fileName = $this->imgPath.md5(time()).'.'.$extension; // renameing image
            //save in field only image name (without upload directory)
            if (isset($this->attributes['image']) && !empty($this->attributes['image']) && File::exists($this->attributes['image'])) {
                $fileName = $this->imgPath.str_replace('\\', '/', $this->attributes['image']);
            }
            $this->attributes['image'] = $fileName;

            //move image to a new directory
            if (File::exists($imageName)) {
                File::move($imageName, $fileName);
               
            }
        }
    }*/

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
