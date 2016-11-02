<?php
namespace App;
use Keyhunter\Administrator\Repository;

class MenuTranslations extends Repository
{
    /**
     * @var string
     */
    public $timestamps = false;
    protected $table = 'menu_translations';

    /**
     * @var array
     */
    protected $fillable = ['language_id', 'menu_item_id', 'url'];
}