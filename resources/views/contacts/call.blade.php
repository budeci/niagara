@extends('layout')

@section('content')
    <section class="contacts_form">
        <div class="container">
            <div class="contacts_form_block">
                <div class="row">
                    <div style="margin-left: 60px;">
                    <h1 class="title">{{$meta->getMeta('form_callback_title')}}</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="contacts_form_contain" style="position: relative">
                            <p>{{$meta->getMeta('form_callback_subtitle')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
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
                        <div class="contacts_for_form">
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
                                    <label for="type">{{$meta->getMeta('form_callback_card')}}</label>
                                    <select name="select" id="type">
                                        @foreach($cards as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-12  contacts_for_checkbox ">
                                    <input type="checkbox" id="check" name="check" >
                                    <label for="check">{{$meta->getMeta('form_callback_accord')}}</label>
                                </div>
                                <input type="hidden" name="form" value="Call me back">
                                {{csrf_field()}}
                                <div class="col-md-12 col-sm-12">
                                    <input type="submit" value="{{$meta->getMeta('form_callback_submit')}}" >
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-12">
                            @include('partials.errors.list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection