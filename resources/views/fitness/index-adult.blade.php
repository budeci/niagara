@extends('layout')
@section('content')
    <section class="fitnes">
        <div class="container">
            <h3 class="title">Fitness Antrenamente</h3>
            <h4>Alege Fitness Antrenamente</h4>
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="col-md-4 col-sm-4">
                        <div class="for_fitnes">
                            <div class="for_fitnes_head">
                                <h3>Mai mult de <br><strong> 30</strong><br> fitness antrenamente</h3>
                            </div>
                            <div class="fitness_content_t">
                                <p>În funcție de recomandările făcute în cadrul procesului de testare, te îndemnăm să alegi unul dintre antrenamentele de mai jos</p>
                                <a href="{{ route('view_trainings') }}">Alege Fitness Antrenamente</a>
                            </div>
                        </div>
                    </div>
                        @foreach($services as $item)
                            <div class="col-md-4 col-sm-4 ">
                                <div class="fitnes_block">
                                    <a href="{{ route('view_fitness', ['slug' => $item->slug]) }}">
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
                        <h3>Oportunitatile clubului</h3>

                            @foreach($services as $item)
                                @if($item->opportunities == 1)
                                    <div class="fitnes_ofert">
                                        <a href="{{ route('view_fitness', ['slug' => $item->slug]) }}">
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