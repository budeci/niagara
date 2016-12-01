<?php
namespace App\Http\Controllers;

use App\Repositories\BeautyRepository;
use App\Repositories\BeautySlideRepository;

/**
 * Class BeautyController
 * @package App\Http\Controllers
 */
use App\Repositories\SlidesRepository;
class BeautyController extends Controller
{
    /**
     * @var BeautyRepository
     */
    protected $beauty;

    /**
     * @var SlidesRepository
     */
    protected $slides;

    /**
     * BeautyController constructor.
     * @param BeautyRepository $beautyRepository
     */
    public function  __construct(BeautyRepository $beautyRepository, SlidesRepository $slidesRepository)
    {
        $this->beauty = $beautyRepository;
        $this->slides = $slidesRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('beauty.show',[
            'posts'=>$this->beauty->getPublic(),
            'category'=>$this->beauty->getCategoryPublic(),
            'slides'=>$this->slides->getPublic($type='beautyspa')
        ]);
    }

}