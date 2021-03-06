<?php

namespace App\Http\Controllers;
use App\Http\Requests\AjaxFormRequest;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\JoinClubRequest;
use App\Repositories\MembershipRepository;
use Redirect;
use Request;

class ContactController extends Controller
{
    /**
     * @var
     */
    protected $membership;

    /**
     * ContactController constructor.
     * @param MembershipRepository $membershipRepository
     */
    public function __construct(MembershipRepository $membershipRepository) {

        $this->membership = $membershipRepository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('contacts.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function member()
    {
        return view('contacts.member');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function callBack($id,$name)
    {
        return view('contacts.call',['cards'=> $this->membership->getById($id)]);
    }


    /**
     * @param ContactFormRequest $request
     * @return mixed
     */
    public function sendForm(ContactFormRequest $request)
    {

        $post = 'entry.280285656='.$request->fname.
                '&entry.856802493='.$request->lname.
                '&entry.338069744='.$request->email.
                '&entry.114065425='.$request->phone.
                '&entry.980405102='.$request->select.
                '&entry.1760556249='.$request->message.
                '&entry.958070317='.$request->form;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://docs.google.com/forms/d/e/1FAIpQLScJh_YBKFS3pPvuO0uZWh6g-aYRbnzoKYdelo-F0LhggpGrFA/formResponse');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_exec($curl);
        curl_close($curl);

        return Redirect::back()->withMessage('Message sent succesful!');

    }

    /**
     * @param JoinClubRequest $request
     * @return mixed
     */
    public function joinClub(JoinClubRequest $request) {

        $post = 'entry.280285656='.$request->name.
            '&entry.338069744='.$request->email.
            '&entry.114065425='.$request->phone.
            '&entry.958070317='.$request->form;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://docs.google.com/forms/d/e/1FAIpQLScJh_YBKFS3pPvuO0uZWh6g-aYRbnzoKYdelo-F0LhggpGrFA/formResponse');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_exec($curl);
        curl_close($curl);

        return Redirect::back()->withMessage('Message sent succesful!');
    }


    /**
     * @param AjaxFormRequest $request
     */
    public function ajaxForm(AjaxFormRequest $request)
    {
        $post = 'entry.280285656='.$request->name.
                '&entry.114065425='.$request->phone.
                '&entry.1760556249='.$request->message.
                '&entry.980405102='.$request->club.
                '&entry.958070317='.$request->form;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://docs.google.com/forms/d/e/1FAIpQLScJh_YBKFS3pPvuO0uZWh6g-aYRbnzoKYdelo-F0LhggpGrFA/formResponse');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_exec($curl);
        curl_close($curl);

        echo json_encode('succes');

    }

}