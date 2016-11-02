<?php
namespace App;
use App\Libraries\TranslatableModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class CategoryEventTranslation extends TranslatableModel implements SluggableInterface
{
    use SluggableTrait;
    /**
     * @var string
     */
    public $timestamps = false;
    protected $table = 'categories_event_translations';

    /**
     * @var array
     */
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug'
    );

/*    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }*/
    protected $fillable = ['name','slug','description','meta_title','meta_description','meta_keyword','language_id','category_event_id'];

}
