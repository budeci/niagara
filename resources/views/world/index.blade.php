@extends('layout')
@section('content')
<section class="world_title">
    <div class="container">
        <h3 class="title">{{$meta->getMeta('world_title')}}</h3>
    </div>
</section>
<section class="events">
    <h4 class="sub_title">{{$meta->getMeta('world_subtitle')}}</h4>
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
    <a href="{{ route('view_events') }}">{{$meta->getMeta('world_all_events')}}</a>
</section>
<section class="news">
    <div class="container">
        <div class="news_niagara">
            <h4 class="sub_title">{{$meta->getMeta('world_news')}}
                <a data-toggle="modal" data-target=".abonare_modal" href=""><img src="/assets/images/ic3.png" alt="">{{$meta->getMeta('world_subscribe')}}</a>
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
                <a href="{{ route('view_news') }}">{{$meta->getMeta('world_all_news')}}</a></div>
        </div>
    </div>
</section>
<section class="style_world">
    <div class="container">
        <h4 class="sub_title">{{$meta->getMeta('world_life_style')}}</h4>
        @foreach ($lifestyle->chunk(2) as $chunk)
            <div class="row">
                @foreach ($chunk as $item)
                    <div class="col-md-2">
                        <div class="style_for_img">
                            <img class="img-responsive" src="{{file_exists(public_path($item->image)) ? Image::url($item->image,200,150,array('crop',false)) : 'http://loremflickr.com/200/150/world,sport/all?random=100'}}" alt="">
                            <span>{{ $item->present()->renderDate($format = 'd F') }}</span>
                            <span></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <div class="style_block">
                                <a href="{{route('life_style_article',['slug' => $item->slug])}}">{{ $item->present()->renderTitle() }}</a>
                                {!! $item->present()->renderShortDescription(200) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="for_style_btn">
            <a href="{{route('life_style')}}" class="world_button show_div">{{$meta->getMeta('world_show_all_news_link')}}</a>
        </div>
    </div>
</section>
<section class="partners">
    <div class="container">
       
        <h3 class="sub_title">{{$meta->getMeta('world_partners')}} <a href="{{ route('view_partner') }}">{{$meta->getMeta('world_partners_more')}}</a></h3>
    </div>
            <ul>
                @foreach($partners as $item)
                    <li><img src="{{file_exists(public_path($item->image)) && $item->image != '' ? URL::to($item->image) : 'http://loremflickr.com/150/50/world,sport/all?random=100'}}" alt=""></li>
                @endforeach
            </ul>
    
</section>
<!--Modal-->
<div class="modal fade abonare_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content abonare_content">
            <h3>{{$meta->getMeta('world_modal_title')}}</h3>
            <h4>{{$meta->getMeta('world_modal_subtitle')}}</h4>
            <form method="post">
                <div class="form-group">
                    <label for="email">{!! $meta->getMeta('form_email') !!}</label>
                    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" >
                    <input type="hidden" name="type" value="news">
                    {{csrf_field()}}
                    <span class="error" style="color: red; font-size: 12px;"></span>
                </div>
                <input class="subscribe" type="submit" value="{!! $meta->getMeta('form_submit') !!}" >
            </form>
        </div>
    </div>
</div>
<!-- end Modal-->
@endsection

@section('js')
    @include('event.partials.js')
    @include('home.partials.js')
@endsection