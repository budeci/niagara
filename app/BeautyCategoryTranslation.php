<?php
namespace App;
use App\Libraries\TranslatableModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class BeautyCategoryTranslation extends TranslatableModel implements SluggableInterface
{
    use SluggableTrait;
    /**
     * @var string
     */
    public $timestamps = false;
    protected $table = 'beautycategory_translations';

    /**
     * @var array
     */
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug'
    );


    protected $fillable = ['name','slug','body','meta_title','meta_description','meta_keyword','language_id','beautycategory_id'];

}
