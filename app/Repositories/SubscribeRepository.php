<?php

namespace App\Repositories;

use App\Subscribers;
class SubscribeRepository extends Repository
{
    /**
     * @return Subscribers
     */
    public function getModel()
    {
        return new Subscribers();
    }
    /**
     * Get public Subscribers.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPublic()
    {
        return self::getModel()
            ->active()
            ->orderBy('id', self::DESC)
            ->get();
    }

    public function getByEmail($email) {

        return self::getModel()
            ->where('email', $email)
            ->first();
    }

    public function addSubscribers(array $request) {
        self::getModel()->create([
            'email' => $request['email'],
            'type'  => $request['type']
        ]);
    }

    public function update($email) {

        return self::getModel()
            ->where('email', $email)
            ->update([
                'active' => 1]);
    }

}