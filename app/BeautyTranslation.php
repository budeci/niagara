<?php
namespace App;
use App\Libraries\TranslatableModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class BeautyTranslation extends TranslatableModel implements SluggableInterface
{
    use SluggableTrait;

    public $timestamps = false;

    protected $table = 'beauty_translations';

    protected $fillable = ['name', 'body','beauty_id','language_id'];

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug'
    );
}




