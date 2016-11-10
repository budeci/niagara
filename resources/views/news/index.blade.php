@extends('layout')
@section('content')
<section class="for_news_page">
    <div class="container">
        <h3 class="title">Новости
        <form action="" style="display: none;">
            <select>
                <option>2016</option>
                <option>2015</option>
                <option>2016</option>
            </select>
        </form>
        </h3>
        <ul class=" for_news_page_tab">
            <li class="active"><a data-toggle="tab" href="*">Все</a></li>
            @foreach($category_news as $category)
                <li><a data-toggle="tab" href="#{{$category->slug}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
        <div class="tab-content news_tab_content">
                @foreach($category_news as $category)
                    <div id="{{$category->slug}}" class="tab-pane fade">
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
                    <button class="show_div">Показать ещё</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('js')
    @include('event.partials.js')
@endsection