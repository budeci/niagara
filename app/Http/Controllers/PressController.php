<?php
namespace App\Http\Controllers;

use App\Repositories\PressRepository;
use Illuminate\Http\Request;
use App\Http\Requests;


class PressController extends Controller
{
    protected $press;

    public function  __construct(PressRepository $pressRepository)
    {
        $this->press=$pressRepository;
    }

    public function show()
    {
        return view('press.show',['press'=>$this->press->getPublic()]);
    }
}