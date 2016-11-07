<?php
namespace App\Http\Controllers;

use App\CategoryAntrenament;
use App\Repositories\CategoryTrainingRepository;
use App\Repositories\TrainingRepository;

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

    public function index()
    {
        $category_trainings = $this->category_trainings->getPublic();
        return view('training.index', compact('category_trainings'));
    }
}