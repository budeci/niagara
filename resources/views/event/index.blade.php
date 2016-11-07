@extends('layout')
@section('content')
    <section class="for_events_main">
        <div class="container">
            <h3 class="title">Мероприятия и соревнования</h3>
            <div class="filters for_events_tab">
                <div class="ui-group">
                    <div class="button-group js-radio-button-group" data-filter-group="category">
                        <button class="button is-checked" data-filter="">Все</button>
                        @foreach($category_events as $category)
                            <button class="button" data-filter=".{{$category->slug}}">{{$category->name}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="filters for_events_tab_center">
        <div class="container">
            
            <div class=" ui-group">
                <div class="button-group js-radio-button-group" data-filter-group="filtr">
                    <button class="button is-checked" data-filter="*">Все</button>
                    <button class="button " data-filter=".soon">Ближайшие</button>
                    <button class="button" data-filter=".past">Прошедшие</button>
                </div>
            </div>
            
            <div class="row grid-item">
                @foreach($category_events as $category)
                    @foreach($category->event as $item)
                        <div class="col-md-3 col-sm-6 data-item {{$category->slug}} {{$item->expire_date > Carbon\Carbon::now() ? 'soon' : 'past'}}">
                            <div class="events_block_tab">
                                <div class="for_events_head">
                                    <img src="{{file_exists(public_path($item->image)) && $item->image != '' ? URL::to($item->image) : 'http://loremflickr.com/400/200/world,sport/all?random=100'}}" data-src="{{URL::to($item->image)}}" alt="">
                                </div>
                                <div class="events_cotent">
                                    <a href="{{ route('view_event', ['slug' => $item->slug]) }}">{{ $item->present()->renderTitle() }}</a>
                                    <p>{{ $item->present()->renderPublishedDate() }} - {{ $item->present()->renderExpiredDate() }}<br><br>
                                    {{ $item->present()->renderTitle() }}</p>
                                </div>
                                <div class="for_pin_events">
                                    <img class="img-resposive" src="/assets/images/pink.png" alt="">
                                    {!! $item->present()->renderShortDescription(200) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                <div class="col-md-12" style="display: none;">
                    <button class="show_div">Показать ещё</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    @include('event.partials.js')
@endsection