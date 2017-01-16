@extends('layout')
@section('content')
    <section class="management">
        <div class="container">
            <h3 class="title">{{$meta->getMeta('trener_title')}}</h3>
            <p>{{$meta->getMeta('trener_subtitle')}}</p>
            <div class="row">
                @foreach($trener as $item)
                    <div class="col-md-3  col-sm-4 ">
                        <div class="for_manager">
                            <a href="{{ route('view_trener', ['slug' => $item->slug]) }}">
                                <div class="for_manager_head" style="background: url({{$item->image}})no-repeat top center;background-size: cover;">
                                    <!-- <img class="img-responsive" src="{{file_exists(public_path($item->image)) && $item->image != '' ? URL::to($item->image) : 'http://loremflickr.com/400/200/world,sport/all?random=100'}}" alt=""> -->
                                </div>
                                <h4>{{ $item->present()->renderTitle() }}</h4>
                            </a>
                            <h5>{{$item->job}}</h5>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
    </section>
@endsection

@section('js')
    @include('home.partials.js')
@endsection