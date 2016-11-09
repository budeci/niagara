<?php
namespace App;
use App\Libraries\TranslatableModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class OffertTranslation extends TranslatableModel implements SluggableInterface
{
    use SluggableTrait;
    /**
     * @var string
     */
    public $timestamps = false;

    protected $table = 'offert_translations';

    protected $fillable = ['name','slug','body','meta_title','meta_description','meta_keyword','language_id'];
    /**
     * @var array
     */
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug'
    );
}