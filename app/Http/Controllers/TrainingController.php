<?php
namespace App\Http\Controllers;

use App\Repositories\TrainingRepository;
use App\Repositories\CategoryTrainingRepository;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Antrenament as Antrenament;

class TrainingController extends Controller
{
    protected $trainings;
    protected $category_trainings;

    public function __construct(TrainingRepository $trainingRepository, CategoryTrainingRepository $categoryTraining)
    {
        $this->trainings = $trainingRepository;
        $this->category_trainings = $categoryTraining;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = $this->trainings->getPublic();
        return view('training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($training)
    {
        $trainings_same = $this->trainings->getSameTraining($training->id, $training->category_antrenament_id);
        return view('training.show', compact('training', 'trainings_same'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
