<?php
namespace App\Http\Controllers;

use App\Repositories\VacancyRepository;

class VacancyController extends Controller
{
    protected $vacancy;

    public function  __construct(VacancyRepository $vacancyRepository)
    {
        $this->vacancy=$vacancyRepository;
    }

    public function show()
    {
       $vacancy = $this->vacancy->getPublic();

        return view('vacancy.show',compact('vacancy'));
    }
}