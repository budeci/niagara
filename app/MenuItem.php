<?php
namespace App;
use Keyhunter\Administrator\Repository;
use Keyhunter\Translatable\HasTranslations;

class MenuItem extends Repository
{
    use HasTranslations;

    /**
     * @var MenuTranslations
     */
    public $timestamps = false;
    public $translationModel = MenuTranslations::class;

    /**
     * @var string
     */
    protected $table = 'menu_item';

    /**
     * @var array
     */

    protected $fillable = ['menu_id','new_tab'];

    /**
     * @var array
     */
    public $translatedAttributes = ['url'];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}
