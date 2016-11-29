<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\CategoryCalcRepository;
use App\Repositories\CalcRepository;
use App\Repositories\ResultCaloriesRepository;
class CalcController extends Controller
{

    /**
     * @var CategoriesEvents
     */
    protected $category_food;
    protected $food;
    protected $result_calories;

    /**
     * CategoriesController constructor.
     * @param CategoriesCalc $categoryRepository
     */
    public function __construct(CategoryCalcRepository $categoryCalc, CalcRepository $food, ResultCaloriesRepository $result_calories)
    {
        $this->category_food = $categoryCalc;
        $this->food = $food;
        $this->result_calories = $result_calories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function calc()
    {
        $category_food = $this->category_food->getPublic();
        return view('calc.calc', compact('category_food'));
    }

    public function calories(Request $request)
    {
        $id = ($request->get('food') != '') ? explode(',',$request->get('food')) : '';
        $food = $this->food->getPublic($id, $paginate = 100);
        $result_calories = $this->result_calories->getPublic();
        return view('calc.calories', compact('food','result_calories'));
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
    public function show($id)
    {
        //
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
