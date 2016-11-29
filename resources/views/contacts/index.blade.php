@extends('layout')

@section('content')
    <section class="contacts_map">
        <div class="container">
            <div class="contacts_map_block">
                <h3>Центральный офис Niagara Fitness</h3>
                <div class="contacts_map_contain">
                    <ul>
                        <li>str. Ghidighici 5, Chișinău, Republica Moldova</li>
                        <br>
                        <br>
                        <li>luni-vineri de la 10:00 pana la 18:00</li>
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
                            <div class="contact_form_succes">
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        <ul style="list-style: none;">
                                            <li>{{Session::get('message')}}</li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <p>Мы рады ответить на любой ваш вопрос, выслушать ваше предложение или замечание</p>
                            <div class="contact-page-errors">@include('partials.errors.list')</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="row">
                            <div class="col-xs-12">

                            </div>
                        </div>
                        <div class="contacts_for_form">
                            <form method="post" action="{{route('send_contact_form')}}">
                                <div class="col-md-6 col-sm-6">
                                    <label for="name">Имя</label>
                                    <input id="name" type="text" name="fname" value="{{old('fname')}}">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="first_name">Фамилия</label>
                                    <input type="text" id="first_name" name="lname" value="{{old('lname')}}">
                                </div>
                                <div class=" col-md-6 col-sm-6">
                                    <label for="phone">Телефон</label>
                                    <input type="text" id="phone" name="phone" value="{{old('phone')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 ">
                                    <label for="e-mail">Электронная почта</label>
                                    <input type="text" id="e-mail" name="email" value="{{old('email')}}">
                                </div>
                                <div class="col-md-12 col-sm-12 ">
                                    <label for="e-mail">Тема собшения</label>
                                    <input type="text" name="theme" value="{{old('theme')}}">
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label for="message">Сообщение</label>
                                    <textarea id="message" name="message">{{old('message')}}</textarea>
                                </div>
                                <div class="col-md-12 col-sm-12  contacts_for_checkbox ">
                                    <input type="checkbox" id="check" name="check" >
                                    <label for="check">Я согласен на обработку персональных данных </label>
                                </div>
                                <input type="hidden" name="form" value="Contact Form">
                                {{csrf_field()}}
                                <div class="col-md-12 col-sm-12 ">
                                    <input type="submit" value="Отправить" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
