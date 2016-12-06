@extends('layout')

@section('content')
    <section class="contacts_map">
        <div class="container">
            <div class="contacts_map_block">
                <h3>{{$meta->getMeta('form_contact_title')}}</h3>
                <div class="contacts_map_contain">
                    <ul>
                        <li>{{settings()->getOption('contacts::adress')}}</li>
                        <br>
                        <br>
                        <li>{{settings()->getOption('contacts::orar')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="contacts_form">
        <div class="container">
            <div class="contacts_form_block">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="contacts_form_contain" style="position: relative">
                            <p>{{$meta->getMeta('form_contact_info')}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="contact_form_succes">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success">
                                            <ul style="list-style: none;">
                                                <li>{{Session::get('message')}}</li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="contacts_for_form" style="@if(Session::has('message')) padding-top:0;@endif">
                            <form method="post" action="{{route('send_contact_form')}}">
                                <div class="col-md-6 col-sm-6">
                                    <label for="name">{{$meta->getMeta('form_callback_fname')}}</label>
                                    <input id="name" type="text" name="fname" value="{{old('fname')}}">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="first_name">{{$meta->getMeta('form_callback_lname')}}</label>
                                    <input type="text" id="first_name" name="lname" value="{{old('lname')}}">
                                </div>
                                <div class=" col-md-6 col-sm-6">
                                    <label for="phone">{{$meta->getMeta('form_callback_phone')}}</label>
                                    <input type="text" id="phone" name="phone" value="{{old('phone')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 ">
                                    <label for="e-mail">{{$meta->getMeta('form_callback_email')}}</label>
                                    <input type="text" id="e-mail" name="email" value="{{old('email')}}">
                                </div>
                                <div class="col-md-12 col-sm-12 ">
                                    <label for="select">{{$meta->getMeta('form_contact_theme')}}</label>
                                    <input type="text" name="select" id="select" value="{{old('select')}}">
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label for="message">{{$meta->getMeta('form_contact_message')}}</label>
                                    <textarea id="message" name="message">{{old('message')}}</textarea>
                                </div>
                                <div class="col-md-12 col-sm-12  contacts_for_checkbox ">
                                    <input type="checkbox" id="check" name="check" >
                                    <label for="check">{{$meta->getMeta('form_accept')}}</label>
                                </div>
                                <input type="hidden" name="form" value="Contact Form">
                                {{csrf_field()}}
                                <div class="col-md-12 col-sm-12 ">
                                    <input type="submit" value="{{$meta->getMeta('form_submit')}}" >
                                </div>
                            </form>
                            <div class="col-xs-12">
                                @include('partials.errors.list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
