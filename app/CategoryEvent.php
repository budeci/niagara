<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use Request;
use File;
class CategoryEvent extends Repository
{
    use HasTranslations;

    /**
     * @var MenuTranslations
     */
    public $translationModel = CategoryEventTranslation::class;

    /**
     * @var string
     */
    protected $table = 'categories_event';

    /**
     * @var array
     */

    protected $fillable = ['active','image'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','slug','description','meta_title','meta_description','meta_keyword'];

    public $imgPath  = 'upload/event/';

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
        if($this->attributes['image']){
            $file = $this->attributes['image'];
            if(File::exists($file)){
                \File::delete($file);
            }
        }
        parent::delete();
    }
    public function event()
    {
        return $this->hasMany(Event::class);
    }
}
