@extends('layout')
@section('content')
    <section class="for_events_main">
        <div class="container">
            <h3 class="title">{{$meta->getmeta('page_event_title')}}</h3>
            <div class="filters for_events_tab">
                <div class="ui-group">
                    <div class="button-group js-radio-button-group" data-filter-group="category">
                        <button class="button is-checked" data-filter="">{{$meta->getmeta('page_event_filter_all')}}</button>
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
                    <button class="button is-checked" data-filter="*">{{$meta->getmeta('page_event_filter_all')}}</button>
                    <button class="button " data-filter=".soon">{{$meta->getmeta('page_event_filter_soon')}}</button>
                    <button class="button" data-filter=".past">{{$meta->getmeta('page_event_filter_past')}}</button>
                </div>
            </div>
            <div class="row grid-item">
                @foreach($category_events as $category)
                    @foreach($category->event as $item)
                        <div class="col-md-3 col-sm-6 data-item {{$category->slug}} {{$item->expire_date > Carbon\Carbon::now() ? 'soon' : 'past'}}">
                            <div class="events_block_tab">
                                <div class="for_events_head">
                                    <img src="{{file_exists(public_path($item->image)) ? Image::url($item->image,400,200,array('crop',false)) : 'http://loremflickr.com/400/200/world,sport/all?random=100'}}" alt="">
                                </div>
                                <div class="events_cotent">
                                    <a href="{{ route('view_event', ['slug' => $item->slug]) }}">{{ $item->present()->renderTitle() }}</a>
                                    <p>{{ $item->present()->renderPublishedDate() }} - {{ $item->present()->renderExpiredDate() }}<br><br>
                                    {{ $item->present()->renderTitle() }}</p>
                                </div>
                                <div class="for_pin_events" style="padding: 15px 5px 0 5px;">
                                    <img class="img-resposive" src="/assets/images/pink.png" alt="">
                                    {!! $item->present()->renderShortDescription(200) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                <div class="col-md-12" style="display: none;">
                    <button class="show_div">{{$meta->getmeta('page_event_show_all')}}</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    @include('event.partials.js')
@endsection