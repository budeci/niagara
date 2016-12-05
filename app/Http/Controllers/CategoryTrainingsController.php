<?php
namespace App\Http\Controllers;

use App\CategoryAntrenament;
use App\Repositories\CategoryTrainingRepository;
use App\Repositories\TrainingRepository;

/**
 * Class CategoryTrainingsController
 * @package App\Http\Controllers
 */
class CategoryTrainingsController extends Controller
{
    /**
     * @var CategoryTrainings
     */
    protected $category_trainings;

    /**
     * CategoriesController constructor.
     * @param CategoryTrainings $categoryRepository
     */
    public function __construct(CategoryTrainingRepository $categoryTraining)
    {
        $this->category_trainings = $categoryTraining;
    }

    /**
     * Show action for category_trainings.
     * 
     * @param CategoryAntrenament $category_trainings
     * @return $this
     */
    public function indexAdult()
    {
        $category_trainings = $this->category_trainings->getPublicAdult();
        return view('training.index', compact('category_trainings'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexKids()
    {
        $category_trainings = $this->category_trainings->getPublicKids();
        return view('training.index', compact('category_trainings'));
    }
}