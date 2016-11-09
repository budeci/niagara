<?php
namespace App\Http\Controllers;

use App\Repositories\OffertRepository;

class OffertController extends Controller
{
    protected $offert;

    public function  __construct(OffertRepository $offertRepository)
    {
        $this->offert=$offertRepository;
    }

    public function show()
    {
        return view('offert.offerts',['offert'=>$this->offert->getPublic()]);
    }

    public function showSingle($offert)
    {
        $randomOffert = $this->offert->getSomeRandom();

        return view('offert.offert',compact('offert','randomOffert'));
    }
}