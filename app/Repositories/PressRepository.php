<?php

namespace App\Repositories;

use App\Press;
use App\PressTranslation;
class PressRepository extends Repository
{
    /**
     * @return Press
     */
    public function getModel()
    {
        return new Press();
    }

    /**
     * @return PressTranslation
     */
    public function getTranslatableModel()
    {
        return new PressTranslation();
    }

    /**
     * Get public posts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPublic()
    {
        return self::getModel()
            ->orderBy('id','DESC')
            ->active()
            ->get();
    }

    public function getBySlug($slug)
    {
        return self::getModel()
            ->where('category_id', $slug)
            ->get();
    }


}