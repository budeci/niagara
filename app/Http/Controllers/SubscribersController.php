<?php
namespace App\Http\Controllers;

use App\Repositories\SubscribeRepository;
use Request;
use Response;


class SubscribersController extends Controller
{
    protected $subscribe;

    public function __construct(SubscribeRepository $subscribeRepository) {

        $this->subscribe = $subscribeRepository;
    }

    public function subscribe()
    {
      $request =  Request::all();

        if($this->subscribe->getByEmail($request['email'])) {
            if($this->subscribe->getByEmail($request['email'])->active != 1){
                $this->subscribe->update($request['email']);
                return Response::json('succes');
            }
            return Response::json('already');
        }
        else {
            $this->subscribe->addSubscribers($request);
            return Response::json('succes');
        }

    }
}
