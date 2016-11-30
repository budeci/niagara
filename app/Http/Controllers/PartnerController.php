<?php
namespace App\Http\Controllers;

use App\Repositories\PartnerRepository;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Partner as Partner;

class PartnerController extends Controller
{

    protected $partners;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partners = $partnerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = $this->partners->getPublic();
        return view('partner.index', compact('partners'));
    }

    public function partner()
    {
        $general = $this->partners->getByGeneral(1);
        $notgeneral = $this->partners->getByGeneral(0);
        return view('partner.partners', compact('general','notgeneral'));
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