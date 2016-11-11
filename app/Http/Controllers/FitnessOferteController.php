<?php

namespace App\Http\Controllers;

use App\Repositories\OpportunityAntrenamentRepository;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\OpportunityAntrenament as OpportunityAntrenament;

class FitnessOferteController extends Controller
{

    protected $services;

    public function __construct(OpportunityAntrenamentRepository $servicesRepository)
    {
        $this->services = $servicesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdult()
    {
        $services = $this->services->getAdultPublic();
        return view('fitness.index', compact('services'));
    }
    public function indexKids()
    {
        $services = $this->services->getKidsPublic();
        return view('fitness.index', compact('services'));
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
    public function show($offer)
    {
        //dd($event);
        //Event::fire(new PostWasViewed($post));

        //$post  = $this->posts->find($post->id);
        
        //return view('blog.post')->withItem($post);

        return view('fitness.show', compact('offer'));
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
