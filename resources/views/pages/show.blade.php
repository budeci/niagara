@extends('layout')
@section('content')
    <section class="contition_head">
        <div class="container">
            <div class="title">{!!$page->title!!}</div>
        </div>
    </section>
    <section class="condition_content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    {!!$page->body!!}
                    <img src="/assets/images/logo_term.png" alt="">
                </div>
            </div>
        </div>
    </section>
@stop