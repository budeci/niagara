<?php

namespace App\Repositories;

use App\Membership;
use App\MembershipTranslation;

class MembershipRepository extends Repository
{
    /**
     * @return Membership
     */
    public function getModel()
    {
        return new Membership();
    }

    /**
     * @return MembershipTranslation
     */
    public function getTranslatableModel()
    {
        return new MembershipTranslation();
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
    public function getById($id)
    {
        return self::getModel()
            ->select('*')
            ->translated()
            ->where('category_membership_id',$id)
            ->get();
    }




}