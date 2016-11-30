@extends('layout')

@section('content')
    <section class="contacts_form">
        <div class="container">
            <div class="contacts_form_block">
                <div class="row">
                    <div style="margin-left: 60px;">
                    <h1 class="title">Заказать обратный звонок</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="contacts_form_contain" style="position: relative">
                            <p>Мы рады ответить на любой ваш вопрос, выслушать ваше предложение или замечание</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
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
                                    <label for="theme">Тип Карточки</label>
                                    <select name="theme" id="theme">
                                        <option value="">Card1</option>
                                        <option value="">Card2</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-12  contacts_for_checkbox ">
                                    <input type="checkbox" id="check" name="check" >
                                    <label for="check">Я согласен на обработку персональных данных </label>
                                </div>
                                <input type="hidden" name="form" value="Contact Form">
                                {{csrf_field()}}
                                <div class="col-md-12 col-sm-12">
                                    <input type="submit" value="Отправить" >
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