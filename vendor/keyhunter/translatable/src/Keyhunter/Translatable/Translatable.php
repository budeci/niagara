<?php namespace Keyhunter\Translatable;

interface Translatable {

    public function translate($locale = null, $withFallback = false);

    public function translateOrNew($locale);

    public function hasTranslation($locale = null);

}