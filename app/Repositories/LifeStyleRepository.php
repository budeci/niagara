<?php

namespace App\Repositories;

use App\LifeStyle;
use App\LifeStyleTranslation;

class LifeStyleRepository extends Repository
{
    /**
     * @return LifeStyle
     */
    public function getModel()
    {
        return new LifeStyle();
    }

    /**
     * @return LifeStyleTranslation
     */
    public function getTranslatableModel()
    {
        return new LifeStyleTranslation();
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

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return self::getModel()
            ->select('*')
            ->translated()
            ->whereSlug($slug)
            ->first();
    }

    public function getSomeRandom()
    {
        return self::getModel()
            ->active()
            ->orderBy('id','DESC')
            ->limit(3)
            ->get();
    }



}