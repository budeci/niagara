@extends('layout')

@section('content')
    <section class="enter_club">
        <div class="container">
            <h3 class="title">Comanda un tur</h3>
            <div class="enter_club_block">
                <div class="row">
                    <div class="col-md-6 col-sm-12 ">
                        <div class="enter_block">
                            <form method="post" action="{{route('enter_club_send_form')}}">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="name">{{$meta->getMeta('form_name')}}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="phone">{{$meta->getMeta('form_phone')}}</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="e-mail">{{$meta->getMeta('form_email')}}</label>
                                        <input type="text"  class="form-control" id="e-mail" name="email" value="{{old('email')}}">
                                    </div>
                                    <div class="col-md-12 col-sm-12  enter_for_checkbox">
                                        <input type="checkbox" id="accord" name="check" required>
                                        <label for="accord">{{$meta->getMeta('form_accept')}}</label>
                                    </div>
                                    <input type="hidden" name="form" value="Devina Membru">
                                    {{csrf_field()}}
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="submit" value="{{$meta->getMeta('form_submit')}}">
                                    </div>
                                </div>
                            </form>
                            <div class="enter-club-form-validation">@include('partials.errors.list')</div>
                        </div>
                    </div>
                <div class="col-md-6 col-sm-12 ">
                    <div class="enter_contain">
                        {!! $meta->getMeta('form_member_page_info') !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection