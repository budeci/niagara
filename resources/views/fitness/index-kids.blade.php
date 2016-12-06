@extends('layout')
@section('content')
    <section class="fitnes">
        <div class="container">
            <h3 class="title">{!! $meta->getMeta('fitnes_kids_title') !!}</h3>
            <h4>{!! $meta->getMeta('fitnes_kids_subtitle') !!}</h4>
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="col-md-4 col-sm-4">
                        <div class="for_fitnes">
                            <div class="for_fitnes_head">
                                <h3>{!! $meta->getMeta('fitnes_kids_training') !!}</h3>
                            </div>
                            <div class="fitness_content_t">
                                <p>{!! $meta->getMeta('fitnes_kids_info') !!}</p>
                                <a href="{{ route('view_trainings_kids') }}">{!! $meta->getMeta('fitnes_training_choice') !!}</a>
                            </div>
                        </div>
                    </div>
                        @foreach($services as $item)
                            <div class="col-md-4 col-sm-4 ">
                                <div class="fitnes_block">
                                    <a href="{{ route('view_fitness', ['slug' => $item->slug, 'name'=>'kids']) }}">
                                        @if($item->image1 != '')
                                            <div class="fitnes_block_head">
                                                <img class="fitnes_offert_img" src="{{$item->image1}}" alt="">
                                            </div>
                                        @endif
                                        <h4>{{ $item->present()->renderTitle() }}</h4>
                                        {!! $item->present()->renderShortDescription(200) !!}
                                    </a>
                                </div>
                            </div>
                        @endforeach 
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="fitnes_containt">
                        <h3>{!! $meta->getMeta('fitnes_club_opportunity') !!}</h3>
                        @foreach($services as $item)
                            @if($item->opportunities == 1)
                                <div class="fitnes_ofert">
                                    <a href="{{ route('view_fitness_service', ['slug' => $item->slug]) }}">
                                        <img src="/assets/images/ic4.png" alt="">
                                        <h4>{{ $item->present()->renderTitle() }}</h4>
                                        {!! $item->present()->renderShortDescription(200) !!}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @include('home.partials.js')
@endsection