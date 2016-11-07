@extends('layout')
@section('content')
    <section class="management">
        <div class="container">
            <h3 class="title">Administrația</h3>
            <p>Echipa Niagara Fitness Club este una complexă, alcătuită atât din sportivi de performanță, cu o vastă pregătire în activitatea pe care o desfășoară, cît și de manageri cu o experiență deosebită. Anume o echipă completă îți poate asigura cele mai bune ore dedicate minții și corpului tău. </p>
            @foreach($teams as $item)
                @if($item->director == 1)
                    <div class="management_block">
                        <img class="img-responsive" src="{{file_exists(public_path($item->image)) && $item->image != '' ? URL::to($item->image) : 'http://loremflickr.com/400/200/world,sport/all?random=100'}}" alt="">
                        <div class="management_content">
                            <h4>{{ $item->present()->renderTitle() }}</h4>
                            {!! $item->present()->renderShortDescription(200) !!}
                        </div>
                    </div>
                @endif
            @endforeach 
            <div class="row">
                @foreach($teams as $item)
                    @if($item->director != 1)
                        <div class="col-md-3  col-sm-4 ">
                            <div class="for_manager">
                                <a href="{{ route('view_team', ['slug' => $item->slug]) }}">
                                    <div class="for_manager_head">
                                        <img class="img-responsive" src="{{file_exists(public_path($item->image)) && $item->image != '' ? URL::to($item->image) : 'http://loremflickr.com/400/200/world,sport/all?random=100'}}" alt="">
                                    </div>
                                    <h4>{{ $item->present()->renderTitle() }}</h4>
                                </a>
                                <h5>{{$item->job}}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach 
            </div>
        </div>
    </section>
@endsection

@section('js')
    @include('home.partials.js')
@endsection