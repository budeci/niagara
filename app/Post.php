<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Libraries\Presenterable\Presenterable;
use App\Libraries\Presenterable\Presenters\PostPresenter;
use App\Traits\ActivateableTrait;
use App\Traits\HasImages;
use Request;
use File;
class Post extends Repository
{
    use HasTranslations,Presenterable, HasImages ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = PostTranslation::class;

    protected $presenter = PostPresenter::class;

    /**
     * @var string
     */
    protected $table = 'news';

    /**
     * @var array
     */

    protected $fillable = ['active','image','category_news_id'];

    /**
     * @var array
     */
    public $translatedAttributes = ['name','slug','body','meta_title','meta_description','meta_keyword'];
    
    /*public function scopePublished($query)
    {
        return $query->whereActive(1);
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
