<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\OpportunitiesRepository;
use App\Repositories\EventRepository;
use App\Repositories\PostRepository;
use App\Repositories\SlidesRepository;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $opportunities;
    private $events;
    private $news;
    private $slides;

    public function __construct(OpportunitiesRepository $opportunitiesRepository, EventRepository $eventsRepository, PostRepository $postRepository, SlidesRepository $slidesRepository)
    {
        $this->opportunities = $opportunitiesRepository;
        $this->events        = $eventsRepository;
        $this->news          = $postRepository;
        $this->slides        = $slidesRepository;
    }

    public function index()
    {
        //dd($request->session()->all());
        $opportunities = $this->opportunities->getPublic();
        $events        = $this->events->getExpire();
        $events_top    = $this->events->getTopHome();
        $news          = $this->news->getPublic();
        $slides        = $this->slides;
        return view('home.index', compact('opportunities','events','events_top','news','slides'));
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