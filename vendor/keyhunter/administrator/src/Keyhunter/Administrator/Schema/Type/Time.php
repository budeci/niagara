<?php namespace Keyhunter\Administrator\Schema\Type;

class Time extends TypeAbstract
{
    protected $format       = 'H:i:s';

    protected $defaultValue = '00:00:00';

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }
}