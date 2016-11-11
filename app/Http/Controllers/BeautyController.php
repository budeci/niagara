<?php
namespace App\Http\Controllers;

use App\Repositories\BeautyRepository;
use App\Repositories\BeautySlideRepository;

/**
 * Class BeautyController
 * @package App\Http\Controllers
 */
class BeautyController extends Controller
{
    /**
     * @var BeautyRepository
     */
    protected $beauty;

    /**
     * @var BeautySlideRepository
     */
    protected $slide;

    /**
     * BeautyController constructor.
     * @param BeautyRepository $beautyRepository
     */
    public function  __construct(BeautyRepository $beautyRepository,
                                 BeautySlideRepository $beautySlideRepository
    )
    {
        $this->beauty=$beautyRepository;
        $this->slide=$beautySlideRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('beauty.show',[
            'posts'=>$this->beauty->getPublic(),
            'category'=>$this->beauty->getCategoryPublic(),
            'slide'=>$this->slide->getPublic()
        ]);
    }

}