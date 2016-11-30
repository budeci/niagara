<?php
namespace App\Http\Controllers;
use App\Faq;

class FaqController extends Controller
{
    public function index()
    {
        return view('faq.index',['faq'=>Faq::get()]);
    }

}