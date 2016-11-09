<?php

namespace App\Repositories;

use App\Advertisement;
use App\AdvertisementTranslation;
class AdvertisementRepository extends Repository
{
    /**
     * @return Advertisement
     */
    public function getModel()
    {
        return new Advertisement();
    }

    /**
     * @return AdvertisementTranslation
     */
    public function getTranslatableModel()
    {
        return new AdvertisementTranslation();
    }

    /**
     * Get public posts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPublic()
    {
        return self::getModel()
            ->active()
            ->first();
    }


}