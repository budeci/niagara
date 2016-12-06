@extends('layout')
@section('content')
    <section class="news">
        <div class=" container ">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="content_slide">
                        <div class="news_slide">
                        @foreach($slides->getPublic($type='home') as $item)
                            @if(file_exists(public_path($item->image)))
                                <div class="item"><img src="{{Image::url($item->image,680,440,array('crop',false))}}" alt="{{$item->name}}"></div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 news_block">
                    <div class="content_slide">
                        @foreach($events_top as $item)
                            <div class="for_new">
                                <a href="{{ route('view_event', ['slug' => $item->slug]) }}">
                                    <div class="for_new_block">
                                        <span><strong>{{ $item->present()->renderPublishedDate($format = 'd M') }}</strong> - <strong>{{ $item->present()->renderExpiredDate($format = 'd M') }}</strong></span>
                                        <h3>{{ $item->present()->renderTitle() }}</h3>
                                    </div>
                                    <img class="img-responsive" src="{{file_exists(public_path($item->image)) ? Image::url($item->image,320,217,array('crop',false)) : 'http://loremflickr.com/320/217/world,sport/all?random=100'}}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news_niagara">
        <div class="container">
            <h4 class="sub_title">{{$meta->getMeta('home_page_news_title')}}
            <a data-toggle="modal" data-target=".abonare_modal" href=""><img src="/assets/images/ic3.png" alt="">{{$meta->getMeta('subscribe_news')}}</a>
            </h4>
            <div class="row">
                <div class="news_niagara_slide">
                    @foreach($news as $item)
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="news_niagara_block">
                                <a href="{{ route('view_post', ['slug' => $item->slug]) }}">{{ $item->present()->renderTitle() }}</a>
                                <span>{{ $item->present()->renderPublishedDate($format = 'd F') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class=" hidden-xs hidden-sm prev"></div>
                <div class=" hidden-xs hidden-sm next"></div>
            </div>
            <div class="news_niagara_link">
                <a href="{{ route('view_news') }}">{{$meta->getMeta('home_all_news')}}</a></div>
            </div>
        </div>
    </section>
    <section class="events">
        <h4 class="sub_title">{{$meta->getMeta('home_events')}}</h4>
        <div class="index_center_slide_border"></div>
        <div class="index_center_slide">
            @foreach($events as $item)
                <div class="events_block">
                    <div class="events_for_img">
                        <img src="{{file_exists(public_path($item->image)) ? Image::url($item->image,400,200,array('crop',false)) : 'http://loremflickr.com/320/217/world,sport/all?random=100'}}" data-src="{{URL::to($item->image)}}" alt="">
                    </div>
                    <a href="{{ route('view_event', ['slug' => $item->slug]) }}">
                        <span>{{ $item->present()->renderPublishedDate($format = 'd') }} - {{ $item->present()->renderExpiredDate($format = 'd') }}</span>
                        <h5>{{ $item->present()->renderExpiredDate($format = 'F') }}</h5>
                        <h4>{{ $item->present()->renderTitle() }}</h4>
                    </a>
                </div>
            @endforeach
        </div>
        <a href="{{ route('view_events') }}">{{$meta->getMeta('home_all_events')}}</a>
    </section>
    <section class="home_main">
        <div class=" container ">
            <div id="my-tab-content" class="tab-content">
                @foreach($opportunities as $key => $item)
                    <div class="tab-pane {{$key == 0 ? 'active' : ''}}" id="nav{{$key}}">
                        <img src="/assets/images/ic2.png" alt="">
                        {!!$item->body!!}
                    </div>
                @endforeach 
            </div>
            <ul id="tabs" class="nav_main" data-tabs="tabs">
                @foreach($opportunities as $key => $item)
                    <li class="{{$key == 0 ? 'active' : ''}}">
                        <a href="#nav{{$key}}" data-toggle="tab">
                            <div class="nav_main_img">
                                <img src="{{$item->image}}">
                            </div>
                        <h5>{{$item->name}}</h5></a>
                    </li>
                 @endforeach 
            </ul>
        </div>
    </section>
   @include('home.partials.slide')
    <section class="last_section">
        <div class=" container ">
            <img src="/assets/images/logo2.png" alt="">
            <h3>{!! $meta->getMeta('home_title_world_niagara') !!}</h3>
            <a href="{{route('join_member')}}"><img src="/assets/images/btn1.png" alt="">{!! $meta->getMeta('home_join') !!}
            </a>
        </div>
    </section>
    <!--Modal-->
    <div class="modal fade abonare_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm ">
            <div class="modal-content abonare_content">
                <h3>{!! $meta->getMeta('subscribe_news') !!}</h3>
                <h4>{!! $meta->getMeta('subscribe_form_title') !!}</h4>
                <form method="post">
                    <div class="form-group">
                        <label for="email">{!! $meta->getMeta('form_email') !!}</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" >
                        <input type="hidden" name="type" value="news">
                        {{csrf_field()}}
                    </div>
                    <input class="subscribe" type="submit" value="{!! $meta->getMeta('form_submit') !!}" >
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('home.partials.js')
@endsection