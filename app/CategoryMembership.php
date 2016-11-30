<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use Request;
use File;
class CategoryMembership extends Repository
{
    use HasTranslations,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = CategoryMembershipTranslation::class;

    /**
     * @var string
     */
    protected $table = 'categories_membership';

    /**
     * @var array
     */

    protected $fillable = ['active','image','ico'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','available','description','language_id','category_membership_id'];

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

    public function membership()
    {
        return $this->hasMany(Membership::class);
    }
}

