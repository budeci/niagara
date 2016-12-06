@extends('layout')
@section('content')
<section class="for_news_page">
    <div class="container">
        <h3 class="title">{{$meta->getMeta('news_title')}}</h3>
        <ul class=" for_news_page_tab" >
            <li class="active"><a data-toggle="tab" href=".all">Все</a></li>
            @foreach($category_news as $key => $category)
                <li><a data-toggle="tab" href=".tab{{$key}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
        <div class="tab-content news_tab_content">
            @foreach($category_news as $key => $category)
                <div class="tab{{$key}} ab-pane tabs_add fade in active in">
                    @foreach($category->post as $item)
                        <div class="row">
                            <div class="col-md-2">
                                <span>{{ $item->present()->renderPublishedDate('j F') }}</span>
                            </div>
                            <div class="col-md-10">
                                <a href="{{ route('view_post', ['slug' => $item->slug]) }}">{{$item->name}}</a>
                                {!! $item->present()->renderShortDescription(400) !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <div class="col-md-12" style="display: none;">
                <button class="show_div">{{$meta->getMeta('new_show_all')}}</button>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    @include('event.partials.js')
@endsection