@extends('layout')
@section('content')
<section class="world_title">
    <div class="container">
        <h3 class="title">Lumea Niagara</h3>
    </div>
</section>
<section class="events">
    <h4 class="sub_title">Evenimente</h4>
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
    <a href="{{ route('view_events') }}">Toate evenimentele si competitiile</a>
</section>
<section class="news">
    <div class="container">
        <div class="news_niagara">
            <h4 class="sub_title">Noutatile Niagara Fitness
                <a data-toggle="modal" data-target=".abonare_modal" href=""><img src="/assets/images/ic3.png" alt="">Aboneaza-te la noutati</a>
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
                <a href="{{ route('view_news') }}">Toate noutatile</a></div>
        </div>
    </div>
</section>
<section class="style_world">
    <div class="container">
        <h4 class="sub_title">Life Style</h4>
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
        <div class="row block_hidden" style="display:none;">
            <div class="col-md-2">
                <div class="style_for_img">
                    <img class="img-responsive" src="/assets/images/first1.jpg" alt="">
                    <span>23 Июня</span>
                    <span></span>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <div class="style_block">
                        <a href="">7 причин, когда можно отказаться от тренировки без чувства вины</a>
                        <p>Перерывы в тренировках в течение недели так же важны, как и сам тренировочный процесс. Это утверждение применимо как к кардио, так и к силовым активностям.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="for_style_btn" style="display:none;">
            <button class="show_div">Все статьи</button>
        </div>
    </div>
</section>
<section class="partners">
    <div class="container">
       
        <h3 class="sub_title">Parteneri Niagara Fitness <a href="{{ route('view_partner') }}">Подробнее о партнерстве</a></h3>
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
            <h3>Aboneaza-te la noutati</h3>
            <h4>Lasa-ti adresa electronica, pentru a fi inregistrata abonarea</h4>
            <form>
                <label for="e-mail">E-mail</label>
                <input id="e-mail" type="text" name="e-mail">
                <input type="submit" value="Trimite">
            </form>
        </div>
    </div>
</div>
<!-- end Modal-->
@endsection

@section('js')
    @include('event.partials.js')
@endsection