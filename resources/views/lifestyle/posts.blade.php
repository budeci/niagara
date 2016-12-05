@extends('layout')

@section('content')
    <section class="section_style_life">
        <div class="container">
            <h3 class="title">{{$meta->getMeta('lifestyle_posts')}}</h3>
            <div class="row">
                @foreach($lifestyle as $item)
                <div class=" section_style_block">
                    <div class="col-md-2">
                        <span>{{$item->present()->renderDate('d F')}}</span>
                    </div>
                    <div class="col-md-10">
                        <a href="{{route('life_style_article',['slug' => $item->slug])}}">{!! $item->name !!}</a>
                        <p>{!! $item->present()->renderShortDescription(450) !!}</p>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12" style="display: none;">
                    <button class="show_div">{{$meta->getMeta('lifestyle_show_all')}}</button>
                </div>
            </div>
        </div>
    </section>
@endsection