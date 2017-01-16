@extends('layout')

@section('content')
    <section class="treners_section">
        <div class="container">
            <h3 class="title">{{$pages->title}}</h3>
            {!! $pages->body !!}
            {!!$pages->more!!}
            <div class="slider_for_treners">
                <div class="treners_slide">
                    <div class="treners_slide_block" style="background:url({{str_replace("\\", "/",$pages->image)}}) no-repeat center center; background-size:cover;">
                        <div class="treners_slide_content">
                            <p>{{$pages->anotation}}</p>
                        </div>
                    </div>
                    <div class="treners_slide_block" style="background:url({{str_replace("\\", "/",$pages->image1)}}) no-repeat center center; background-size:cover;">
                        <div class="treners_slide_content">
                            <p>{{$pages->anotation1}}</p>
                        </div>
                    </div>
                    <div class="treners_slide_block" style="background:url({{str_replace("\\", "/",$pages->image2)}}) no-repeat center center; background-size:cover;">
                        <div class="treners_slide_content">
                            <p>{{$pages->anotation2}}</p>
                        </div>
                    </div>

                </div>
                <span class=" hidden-xs prev_tren"></span>
                <span class="hidden-xs next_tren"></span>
            </div>
        </div>
    </section>

@stop