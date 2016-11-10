<?php
namespace App\Http\Controllers;

use App\Repositories\LifeStyleRepository;

class LifeStyleController extends Controller
{
    protected $lifestyle;

    public function  __construct(LifeStyleRepository $lifeStyleRepository)
    {
        $this->lifestyle=$lifeStyleRepository;
    }

    public function show()
    {
        return view('lifestyle.posts',['lifestyle'=>$this->lifestyle->getPublic()]);
    }

    public function showSingle($lifestyle)
    {
        return view('lifestyle.post',compact('lifestyle'));
    }
}