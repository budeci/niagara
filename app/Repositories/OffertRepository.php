<?php

namespace App\Repositories;

use App\Offert;
use App\OffertTranslation;

class OffertRepository extends Repository
{
    /**
     * @return Offert
     */
    public function getModel()
    {
        return new Offert();
    }

    /**
     * @return OffertTranslation
     */
    public function getTranslatableModel()
    {
        return new OffertTranslation();
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