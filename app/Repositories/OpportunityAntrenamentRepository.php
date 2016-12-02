<?php

namespace App\Repositories;

use App\OpportunityAntrenament;
use App\OpportunityAntrenamentTranslation;
class OpportunityAntrenamentRepository extends Repository
{
    /**
     * @return KidsOpportunity
     */
    public function getModel()
    {
        return new OpportunityAntrenament();
    }

    /**
     * @return OpportunityAntrenamentTranslation
     */
    public function getTranslatableModel()
    {
        return new OpportunityAntrenamentTranslation();
    }

    /**
     * Get public posts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAdultPublic()
    {
        return self::getModel()
            ->active()
            ->whereCategoryType('adult')
            ->orderBy('id', self::DESC)
            ->get();
    }
    public function getKidsPublic()
    {
        return self::getModel()
            ->active()
            ->whereCategoryType('kids')
            ->orderBy('id', self::DESC)
            ->get();
    }
    public function getRandOffer($id,$type)
    {
        return self::getModel()
            ->active()
            ->where('category_type', $type)
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->get();
    }
    /**
     * Get popular public posts.
     *
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPopularPublic($count = 4)
    {
        // todo: popular featured posts.
        return $this->getModel()
            ->active()
            ->orderBy('view_count', self::DESC)
            ->orderBy('id', self::DESC)
            ->take($count)
            ->get();
    }

    /**
     * Get post by slug.
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
            ->active()
            ->first();
    }

    /**
     * Increment view_counter by 1.
     *
     * @param Post $post
     */
    public function incrementViewCount($post)
    {
        $post->increment('view_count');
    }

    public function reformatDateString($date, $delimiter = '.')
    {
        $datas = explode($delimiter, $date);

        $new_date['d'] = $datas[0];
        $new_date['m'] = $datas[1];
        $new_date['y'] = $datas[2];

        return $new_date;
    }

    /**
     * Convert string date to \Carbon/Carbon timestamp.
     *
     * @param $date
     * @return static
     */
    public function dateToTimestamp($date)
    {
        $dates = $this->reformatDateString($date);

        return Carbon::createFromDate($dates['y'], $dates['m'], $dates['d']);
    }

}