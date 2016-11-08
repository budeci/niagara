<?php

namespace App\Repositories;
use App\CategoryEvent;
use App\CategoryEventTranslation;
use App\Contracts\TranslatableRepositoryContract;

class CategoryEventsRepository extends Repository implements TranslatableRepositoryContract
{
    /**
     * @return CategoryEvent
     */
    public function getModel()
    {
        return new CategoryEvent();
    }

    /**
     * @return CategoryEventTranslation
     */
    public function getTranslatableModel()
    {
        return new CategoryEventTranslation();
    }

    /**
     * Create a record in categories table.
     *
     * @param array $data
     * @return CategoryEvent
     */
    public function create(array $data)
    {
        return self::getModel()
            ->create($data);
    }

    /**
     * Get active rows.
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
     * Get category collection for sidebar.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSidebarCollection()
    {
       return self::getModel()
           ->where('show_in_sidebar', 1)
           ->parent()
           ->active()
           ->ranked()
           ->get();
    }

    /**
     * Get category collection for footer.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getFooterCollection()
    {
        return self::getModel()
            ->where('show_in_footer', '=', 1)
            ->parent()
            ->active()
            ->ranked()
            ->get();
    }

    /**
     * Get row by translated slug.
     *
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

    /**
     * Get parent categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPublicCategories()
    {
        return $this->getSidebarCollection();
    }

    /**
     * Get popular category.
     *
     * @return mixed
     */
    public function getPopularCategory()
    {
        $defaultCategory = $this->getDefaultPopularCategory();
        $category_id = ($defaultCategory) ? $defaultCategory->id : '';

        return $this->getModel()
            ->select('*')
            ->where(
                'id',
                settings()->getOption(
                    'homepage::popular_category',
                    $category_id
                )
            )
            ->active()
            ->first();
    }

    private function getDefaultPopularCategory()
    {
        return self::getModel()
            ->active()
            // add join where will show category which the product's count is the bigger.
            ->first();
    }
}