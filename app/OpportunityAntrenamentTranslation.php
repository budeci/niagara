<?php
namespace App;
use App\Libraries\TranslatableModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class OpportunityAntrenamentTranslation extends TranslatableModel implements SluggableInterface
{
    use SluggableTrait;
    /**
     * @var string
     */
    public $timestamps = false;
    protected $table = 'opportunity_antrenament_translation';
    protected $fillable = ['annotation1','annotation2','annotation3','name','slug','body','meta_title','meta_description','meta_keyword','language_id'];
    /**
     * @var array
     */
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug'
    );
}