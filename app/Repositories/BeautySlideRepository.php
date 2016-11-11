<?php

namespace App\Repositories;

use App\BeautySlide;

/**
 * Class BeautyRepository
 * @package App\Repositories
 */
class BeautySlideRepository extends Repository
{
    /**
     * @return BeautySlide
     */
    public function getModel()
    {
        return new BeautySlide();
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
            ->get();
    }


}