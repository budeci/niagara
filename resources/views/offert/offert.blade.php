@extends('layout')

@section('content')
    <section class="special_oferts_article">
        <div class="container">
            <div class="oferts_article_block">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 title_oferts_article_block">
                        <h3>{!! $offert->name !!}</h3>
                    </div>
                </div>
            </div>
            <div class="row oferts_article_list">
                <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 article_img">
                    <img class="img-responsive" src="{{$offert->image}}" alt="">
                    <span>до {{ $offert->present()->renderExpiredDate() }}</span>
                </div>
                <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
                   {!! $offert->body !!}
                </div>
            </div>
            <div class="oferts_article_bord"></div>
        </div>
    </section>

    <section class="special_oofert_last_section">
        <div class="container">
            <div class="row">
                @foreach($randomOffert as $item)
                    <div class="col-md-4 col-sm-4 special_oferts_block">
                        <a href="{{route('show_ofert',['slug'=>$item->slug])}}">
                            <img src="{{$item->image}}" alt="">
                            <span>до {{ $item->present()->renderExpiredDate() }}</span>
                            <div class="special_oferts_contain_article">
                                <h4>{!! $item->name !!}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection