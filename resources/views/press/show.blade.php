@extends('layout')

@section('content')
<section class="press">
    <div class="container">
        <h3 class="title">{{$meta->getMeta('press_title')}}</h3>
    </div>
</section>
<section class="for_press">
    <div class="container">
        <ul class="press_btn">
            <li class="active"><a data-toggle="tab" href="#press_about">{{$meta->getMeta('press_tab_release')}}</a></li>
            <li><a data-toggle="tab" href="#press_releases">{{$meta->getMeta('press_tab_about_us')}}</a></li>
        </ul>
        <div class="tab-content">
            <div id="press_about" class="tab-pane fade in active">
                @foreach($press as $item)
                    @if($item->category_id == 1)
                        <div class="row" style="display: none;">
                            <div class="press_block">
                                <div class="col-md-2">
                                    <span>{{\Carbon\Carbon::now()->parse($item->created_at)->format('d F')}}</span>
                                </div>
                                <div class="col-md-10">
                                    <a href="{{$item->link}}" target="_blank">{!! $item->name !!}</a>
                                    <p>{!! $item->body !!}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-md-12">
                        <button class="show_div">{{$meta->getMeta('press_show_all')}}</button>
                    </div>
                </div>
            </div>
            <div id="press_releases" class="tab-pane">
                @foreach($press as $item)
                    @if($item->category_id == 2)
                        <div class="row" style="display: none;">
                            <div class="press_block">
                                <div class="col-md-2">
                                    <span>{{\Carbon\Carbon::now()->parse($item->created_at)->format('d F')}}</span>
                                </div>
                                <div class="col-md-10">
                                    <a href="{{$item->link}}" target="_blank">{!! $item->name !!}</a>
                                    <p>{!! $item->body !!}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-md-12">
                        <button class="show_div">{{$meta->getMeta('press_show_all')}}</button>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
