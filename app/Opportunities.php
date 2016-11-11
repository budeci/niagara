<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Libraries\Presenterable\Presenterable;
use App\Libraries\Presenterable\Presenters\OpportunitiesPresenter;
use App\Traits\ActivateableTrait;
use App\Traits\HasImages;
use Request;
use File;
use Carbon\Carbon;
class Opportunities extends Repository
{
     use HasTranslations, Presenterable, HasImages, ActivateableTrait;

    /**
     * @var MenuTranslations
     */

    public $translationModel = OpportunitiesTranslation::class;
    protected $presenter = OpportunitiesPresenter::class;
    /**
     * @var string
     */
    protected $table = 'opportunities';

    /**
     * @var array
     */

    protected $fillable = ['active','image'];

    public $translatedAttributes = ['name','body','opportunities_id'];
    public $imgPath  = 'upload/opportunities/';

/*    public function scopePublished($query)
    {
        return $query->whereActive(1);
    }*/

    public function getImageAttribute($value)
    {
        //add full path to image
      if (!empty($value)) {
        return '/'.$value;
      }
    }
    public function setImageAttribute($value)
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
    }

    public function delete(){
        if(isset($this->attributes['image'])){
            $file = $this->attributes['image'];
            if(File::exists($file)){
                \File::delete($file);
            }
        }
        parent::delete();
    }
}


