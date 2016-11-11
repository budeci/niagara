<?php

namespace App\Repositories;

use App\Beauty;
use App\BeautyTranslation;
use App\BeautyCategory;
use App\BeautyCategoryTranslation;

/**
 * Class BeautyRepository
 * @package App\Repositories
 */
class BeautyRepository extends Repository
{
    /**
     * @return Beauty
     */
    public function getModel()
    {
        return new Beauty();
    }

    /**
     * @return BeautyTranslation
     */
    public function getTranslatableModel()
    {
        return new BeautyTranslation();
    }

    /**
     * @return BeautyCategory
     */
    public function getCategoryModel()
    {
        return new BeautyCategory();
    }

    /**
     * @return BeautyCategoryTranslation
     */
    public function getCategoryTranslatableModel()
    {
        return new BeautyCategoryTranslation();
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

    /**
     * @return mixed
     */
    public function getCategoryPublic()
    {
        return self::getCategoryModel()
            ->active()
            ->get();
    }

}