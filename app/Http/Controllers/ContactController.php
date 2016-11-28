<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\CallUsAjaxrequest;
use Redirect;

class ContactController extends Controller
{

    public function index()
    {
        return view('contacts.index');
    }

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

    public function sendTourForm(CallUsAjaxrequest $request)
    {
        $post = 'entry.280285656='.$request->name.
                '&entry.114065425='.$request->phone.
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

        echo json_encode('succes');

    }



}