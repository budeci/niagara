<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;
use App\Traits\ActivateableTrait;
use Request;

class Vacancy extends Repository
{
    use HasTranslations ,ActivateableTrait;

    /**
     * @var MenuTranslations
     */
    public $translationModel = VacancyTranslation::class;

    /**
     * @var string
     */
    protected $table = 'vacancy';

    /**
     * @var array
     */

    protected $fillable = ['active','view_count'];

    /**
     * @var array
     */
    public $translatedAttributes = ['departament','name','slug','body','location','meta_title','meta_description','meta_keyword'];

}
