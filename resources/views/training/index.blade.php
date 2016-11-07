@extends('layout')
@section('content')
    <section class="fitnes">
        <div class="container">
            <h3 class="title">Fitness Antrenamente</h3>
            <h4>Alege Fitness Antrenamente</h4>
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                     @foreach($category_trainings as $category)
                        @foreach($category->antrenament as $item)
                            @if($item->offer == 1)
                                <div class="col-md-4 col-sm-4">
                                    <div class="for_fitnes">
                                        <div class="for_fitnes_head">
                                            <h3>{{ $item->present()->renderTitle() }}</h3>
                                        </div>
                                        <div class="fitness_content_t">
                                            {!! $item->present()->renderShortDescription(200) !!}
                                            <a href="{{ route('view_training', ['slug' => $item->slug]) }}">Alege Fitness Antrenamente</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-4 col-sm-4 ">
                                    <div class="fitnes_block">
                                        <a href="{{ route('view_training', ['slug' => $item->slug]) }}">
                                            @if($item->image != '')
                                                <div class="fitnes_block_head">
                                                    <img class="fitnes_offert_img" src="{{$item->image}}" alt="">
                                                </div>
                                            @endif
                                            <h4>{{ $item->present()->renderTitle() }}</h4>
                                            {!! $item->present()->renderShortDescription(200) !!}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach 
                    @endforeach
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="fitnes_containt">
                        <h3>Oportunitatile clubului</h3>

                        @foreach($category_trainings as $category)
                            @foreach($category->antrenament as $item)
                                @if($item->opportunities == 1)
                                    <div class="fitnes_ofert">
                                        <a href="/bazin.php">
                                            <img src="/assets/images/ic4.png" alt="">
                                            <h4>{{ $item->present()->renderTitle() }}</h4>
                                            {!! $item->present()->renderShortDescription(200) !!}
                                        </a>
                                    </div>
                                @endif
                            @endforeach    
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