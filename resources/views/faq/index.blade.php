@extends('layout')

@section('content')
<section class="faq_head">
    <div class="container">
        <h3 class="title">{{$meta->getMeta('faq_page_title')}}</h3>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @foreach($faq as $item)
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading{{$item->id}}">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#tab{{$item->id}}" aria-expanded="false" aria-controls="tab{{$item->id}}">
                            {!! $item->name !!}
                        </a>
                    </h4>
                </div>
                <div id="tab{{$item->id}}" class="panel-collapse collapse" role="tabpanel" aria-expanded="false" aria-labelledby="heading{{$item->id}}">
                    <div class="panel-body">
                        {!! $item->body !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="faq_last">
    <div class="container">
        <h3 class="title">{{$meta->getMeta('faq_form_title')}}</h3>
        <section class="contacts_form">
            <div class="container">
                <div class="contacts_form_block">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="contacts_form_contain">
                                <p>{{$meta->getMeta('faq_form_subtitle')}}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 ">
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
                                        <label for="phone">{{$meta->getMeta('form_phone')}}</label>
                                        <input type="text" id="phone" name="phone" value="{{old('phone')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="e-mail">{{$meta->getMeta('form_email')}}</label>
                                        <input type="text" id="e-mail" name="email" value="{{old('email')}}">
                                    </div>
                                    <div class="col-md-12 col-sm-12 ">
                                        <label for="e-mail">{{$meta->getMeta('form_theme')}}</label>
                                        <input type="text" name="theme" value="{{old('theme')}}">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label for="message">Сообщение</label>
                                        <textarea id="message" name="message">{{old('message')}}</textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12  contacts_for_checkbox ">
                                        <input type="checkbox" id="check" name="check" >
                                        <label for="check">{{$meta->getMeta('form_accept')}}</label>
                                    </div>
                                    <input type="hidden" name="form" value="Contact Form">
                                    {{csrf_field()}}
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="submit" value="{{$meta->getMeta('form_submit')}}">
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
@section('js')
    @include('faq.partials.js')
@endsection