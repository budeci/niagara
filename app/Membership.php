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
class Membership extends Repository
{
    use HasTranslations,Presenterable, HasImages ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = MembershipTranslation::class;

    protected $presenter = MainPresenter::class;

    /**
     * @var string
     */
    protected $table = 'membership';

    /**
     * @var array
     */

    protected $fillable = ['active','ico','category_membership_id'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','body'];
    
    public function getImageAttribute($value)
    {
        //add full path to image
      if (!empty($value)) {
        return str_replace('\\', '/', $value);
      }
    }
    public function categoryMembership()
    {
        return $this->belongsTo(categoryMembership::class);
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
