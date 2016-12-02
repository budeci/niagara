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
        return view('fitness.index-adult', compact('services'));
    }
    public function indexKids()
    {
        $services = $this->services->getKidsPublic();
        return view('fitness.index-kids', compact('services'));
    }
    public function service($service)
    {
        return view('fitness.opportunities', compact('service'));
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
    public function show($offer,$type)
    {
        //dd($event);
        //Event::fire(new PostWasViewed($post));

        //$post  = $this->posts->find($post->id);
        
        //return view('blog.post')->withItem($post);
        $offer_rand = $this->services->getRandOffer($offer->id,$type);
        return view('fitness.show', compact('offer', 'offer_rand'));
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
