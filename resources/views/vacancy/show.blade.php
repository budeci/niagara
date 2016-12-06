@extends('layout')

@section('content')

    <section class="head_jobs">
        <div class="container">
            <h3 class="title">{{$meta->getMeta('vacancy_title')}}</h3>
            <button>{{$meta->getMeta('vacancy_send_cv')}}</button>
            <a data-toggle="modal" data-target=".modal_post" href=""> <img src="/assets/images/ic3.png" alt="">{{$meta->getMeta('vacancy_subscribe')}}</a>
        </div>
    </section>
    <section class="for_jobs">
        <div class="container">
            @foreach($vacancy as $item)
                <div class="row">
                    <div class="col-md-offset-1 col-md-7 col-sm-offset-1 col-sm-7">
                       {!! $item->body !!}
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <ul class="for_jobs_block">
                            <li>{!! $item->departament !!}</li>
                            <li>{!! $item->location !!}</li>
                        </ul>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </section>
   @include('vacancy.partials.modal')

@endsection

@section('js')
    @include('home.partials.js')
@endsection