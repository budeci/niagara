<?php namespace Keyhunter\Administrator\Model;

use Keyhunter\Administrator\Repository;
use Request;
use File;
class Settings extends Repository {

    protected $table    = 'options';

    public $timestamps  = false;

    protected $fillable = ['*'];

    static protected $options = null;

  /**
     * Fetch value by key
     *
     * @param $key
     * @param $default
     * @return null
     */
    static public function getOption($key, $default = null)
    {
        if (null === self::$options)
        {
            self::$options = self::listOptions();
        }

		return isset(self::$options[$key]) ? self::$options[$key] : $default;
    }

    /**
     * Fetch all settings
     *
     * @return mixed
     */
    static public function listOptions()
    {
        return (new static)->lists('value', 'key');
    }
    

    public function getImageAttribute($value)
    {
        //add full path to image
      if (!empty($value)) {
        return str_replace('\\', '/', $value);
      }
    }
    public function delete(){
        if($this->attributes['image']){
            $file = $this->attributes['image'];
            if(File::exists($file)){
                \File::delete($file);
            }
        }
        parent::delete();
    }
}