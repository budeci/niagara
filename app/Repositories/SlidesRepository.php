<?php

namespace App\Repositories;

use App\Slides;
class SlidesRepository extends Repository
{
    /**
     * @return Post
     */
    public function getModel()
    {
        return new Slides();
    }


    /**
     * Get public posts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPublic($type='home')
    {
        return self::getModel()
            ->active()
            ->orderBy('id', self::DESC)
            ->whereType($type)
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

}