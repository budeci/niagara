<?php

namespace App\Repositories;
use App\Vacancy;
use App\VacancyTranslation;

class VacancyRepository extends Repository
{
    /**
     * @return Vacancy
     */
    public function getModel()
    {
        return new Vacancy();
    }

    /**
     * @return VacancyTranslation
     */
    public function getTranslatableModel()
    {
        return new VacancyTranslation();
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