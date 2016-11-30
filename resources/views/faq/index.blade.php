@extends('layout')

@section('content')
<section class="faq_head">
    <div class="container">
        <h3 class="title">Часто задаваемые вопросы</h3>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Нужно ли записываться на групповые тренировки?
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        Какова температура воды и в воздуха в зоне детского бассейна?
                        Мы соблюдаем нормы и поддерживаем температуру воды в детских бассейнах в диапазоне 28–29° C, а температуру воздуха в их зонах — 30–31° C.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Где можно послушать или скачать композиции с тренировок Les Mills?
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Почему ребёнок не может ходить со мной в клуб после 21.00?
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq_last">
    <div class="container">
        <h3 class="title">Не нашли ответ на свой вопрос?</h3>
        <section class="contacts_form">
            <div class="container">
                <div class="contacts_form_block">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="contacts_form_contain">
                                <p>Мы рады ответить на любой ваш вопрос, выслушать ваше предложение или замечание</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 ">
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
                            <div class="row">
                                <div class="col-xs-12">
                                    @include('partials.errors.list')
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
@stop