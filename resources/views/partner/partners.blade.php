@extends('layout')
@section('content')
    <section class="partners_members">
        <div class="container">
            <h3 class="title">{{$meta->getMeta('partners_title')}}</h3>
            <h4>{{$meta->getMeta('partners_subtitle')}}</h4>
            @foreach($general as $item)
                <div class="for_partners_members">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="partner_image_vertical">
                                <img src="{{$item->image}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h3>{!! $item->name !!}</h3>
                            {!! $item->body !!}
                            <a href="{{$item->link}}">{{$item->link}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="partners_section">
        <div class="container">
            <h4>{{$meta->getMeta('partner_card_title')}}</h4>
            <div class="row">
                @foreach($notgeneral as $item)
                <div class="col-md-3 col-sm-6">
                    <div class="block_partners_members">
                        <img class="img-responsive" src="{{$item->image}}" alt="">
                        <span class="partners_members_discount">{{$item->sale}}</span>
                        <h3>{!! $item->name !!}</h3>
                        {!! $item->body !!}
                        <a href="{{$item->link}}">{{$item->link}}</a>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12">
                    <div class="for_partners_btn">
                        <a href="{{route('join_member')}}">{{$meta->getMeta('partner_join')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop