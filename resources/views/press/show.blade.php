@extends('layout')

@section('content')
<section class="press">
    <div class="container">
        <h3 class="title">Пресса</h3>
       {{-- <select>
            <option class="selected">Все годы</option>
            <option>2016</option>
            <option>2015</option>
            <option>2014</option>
        </select>--}}
    </div>
</section>
<section class="for_press">
    <div class="container">
        <ul class="press_btn">
            <li class="active"><a data-toggle="tab" href="#press_about">Пресс-релизы</a></li>
            <li><a data-toggle="tab" href="#press_releases">Пресса о нас</a></li>
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
                        <button class="show_div">Показать еще</button>
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
                        <button class="show_div">Показать еще</button>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
