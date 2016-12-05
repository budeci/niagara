@extends('layout')
@section('content')

<section class="fitness_article_bg" style="background: url({{$offer->image1 != '' ? URL::to($offer->image1) : 'http://loremflickr.com/1920/785/world,sport/all?random=100'}}) no-repeat center center;
    background-size: cover;">
    <div class="container">
        <h3>{{$offer->name}}</h3>
        {!!$offer->body!!}
    </div>
</section>

<section class="main_fitness_article">
    <div class="container">
        <h3>{!! $meta->getMeta('fitnes_programs') !!}</h3>
        <div class="row">
            @foreach($offer_rand as $item)
                <div class="col-md-3 col-sm-4 element-item {{$item->slug}}">
                    <div class="block_last_fitness">
                        <a href="{{ route('view_training', ['slug' => $item->slug]) }}">
                            <img class="img-responsive" src="{{$item->image1 != '' ? Image::url($item->image1,305,194,array('crop',false)) : 'http://loremflickr.com/305/194/world,sport/all?random=100'}}" alt="">
                            <h4>{{ $item->present()->renderTitle() }}</h4>
                        </a>
                        <div class="block_last_content">
                            {!! $item->present()->renderShortDescription(200) !!}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12" style="display: none;">
                <div class="for_fitnes_more">
                    <a href="/fitness_program.php">{!! $meta->getMeta('fitnes_show_all') !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="last_fitnes_article">
    <div class="container">
        <h3>{!! $meta->getMeta('fitnes_clients') !!}</h3>
        <div class="for_fitnes_more">
            <a href="">{!! $meta->getMeta('fitnes_clients_related') !!}</a>
        </div>
    </div>
</section>

@endsection

@section('js')
    @include('fitness.partials.js')
@endsection