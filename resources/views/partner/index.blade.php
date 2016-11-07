@extends('layout')
@section('content')
<section class="partners_page">
    <div class="container">
        <h3 class="title">Партнёры и привилегии для членов клуба</h3>
        <h4 class="sub_title">Генеральные партнёры</h4>
        <div class="row">
            @foreach($partners as $item)
                <div class="col-md-3 col-sm-6 ">
                    <div class="partners_block">
                        <img class="img-responsive" src="{{file_exists(public_path($item->image)) && $item->image != '' ? URL::to($item->image) : 'http://loremflickr.com/210/50/world,sport/all?random=100'}}" alt="">
                        <span class="partners_discount">{{ $item->sale}}</span>
                        {!! $item->present()->renderShortDescription(250) !!}
                        <a href="{{ $item->link}}">{{ $item->link}}</a>
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