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
class Antrenament extends Repository
{
    use HasTranslations,Presenterable, HasImages ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = AntrenamentTranslation::class;

    protected $presenter = TrainingPresenter::class;

    /**
     * @var string
     */
    protected $table = 'antrenament';

    /**
     * @var array
     */

    protected $fillable = ['active','image1','image2','image3','category_antrenament_id'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','annotation1','annotation2','annotation3','slug','body','meta_title','meta_description','meta_keyword'];
    //public $imgPath  = '/upload/antrenament/';

    public function scopePublished($query)
    {
        return $query->whereActive(1);
    }

    public function getImage1Attribute($value)
    {
        //add full path to image
      if (!empty($value)) {
        return str_replace('\\', '/', $value);
      }
    }
    public function getImage2Attribute($value)
    {
        //add full path to image
      if (!empty($value)) {
        return str_replace('\\', '/', $value);
      }
    }
    public function getImage3Attribute($value)
    {
        //add full path to image
      if (!empty($value)) {
        return str_replace('\\', '/', $value);
      }
    }
/*    public function setImage1Attribute($value)
    {
        //remove file
        if (is_null($value) or $value == "") {

            $image = str_replace('\\', '/', $this->attributes['image1']);
            if (File::exists($image)) {
                File::delete($image);
            }

            //clean field
            $this->attributes['image1'] = null;

        } else { //add file

            //get name from path
            $imageName = last(explode('/', str_replace('\\', '/', $value)));
            if (Request::hasFile('image1')) {
                $extension = Request::file('image1')->getClientOriginalExtension();
            }else{
                $extension = File::extension($imageName);
            }
            
            
            //$fileName = $this->imgPath.md5(time()).'.'.$extension; // renameing image
            $fileName    = Request::file('image1')->getClientOriginalName();
            $without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
            $time = time();
            $fileName  = $this->imgPath.str_slug(strtolower($without_ext)).'-'.$time.'.'.$extension;
            //save in field only image name (without upload directory)
            if (isset($this->attributes['image1']) && !empty($this->attributes['image1']) && File::exists($this->attributes['image1'])) {
                $fileName = $this->imgPath.str_replace('\\', '/', $this->attributes['image1']);
            }
            $this->attributes['image1'] = $fileName;

            //move image to a new directory
            if (File::exists($imageName)) {
                File::move($imageName, ltrim($fileName, '/'));
            }

        }
    }*/
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
