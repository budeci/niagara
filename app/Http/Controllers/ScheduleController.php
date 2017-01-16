<?php
namespace App\Http\Controllers;

use App\Repositories\ScheduleRepository;
use App\Repositories\DayRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Schedule as Schedule;
class ScheduleController extends Controller
{

    protected $schedule;
    protected $days;
    public function __construct(ScheduleRepository $scheduleRepository,DayRepository $dayRepository)
    {
        $this->schedule = $scheduleRepository;
        $this->days = $dayRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$schedule = $this->schedule->getPublic();
        $days = $this->days->getPublic();
        return view('schedule.index', compact('days'));
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
    public function show($orar)
    {
        return view('schedule.calendar.info', [ 'orar' => $orar ]);
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
