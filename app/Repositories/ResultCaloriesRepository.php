<?php

namespace App\Repositories;

use App\ResultCalories;
use App\ResultCaloriesTranslation;
use Carbon\Carbon;
class ResultCaloriesRepository extends Repository
{
    /**
     * @return Post
     */
    public function getModel()
    {
        return new ResultCalories();
    }

    /**
     * @return ResultCaloriesTranslation
     */
    public function getTranslatableModel()
    {
        return new ResultCaloriesTranslation();
    }

    /**
     * Get public posts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPublic($paginate = 20)
    {
        return self::getModel()
            ->active()
            ->orderBy('id', self::DESC)
            ->paginate($paginate);
    }

    public function getExpire($paginate = 20)
    {
        return self::getModel()
            ->active()
            ->orderBy('expire_date', self::ASC)
            ->where('expire_date','>=',Carbon::now())
            ->paginate($paginate);
    }
    public function getTopHome($paginate = 4)
    {
        return self::getModel()
            ->active()
            ->orderBy('home_show', self::DESC)
            ->orderBy('expire_date', self::ASC)
            ->where('expire_date','>=',Carbon::now())
            ->paginate($paginate);
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