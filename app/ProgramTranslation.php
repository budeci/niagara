<?php
namespace App;
use App\Libraries\TranslatableModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
class ProgramTranslation  extends TranslatableModel implements SluggableInterface
{
    use SluggableTrait;
    /**
     * @var array
     */
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug'
    );
    
    public $timestamps  = false;
    protected $table    = 'program_translations';
    protected $fillable = ['name','body','hall','slug','program_id','language_id'];
}