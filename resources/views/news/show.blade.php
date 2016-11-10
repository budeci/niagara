@extends('layout')
@section('content')
<section class="news_article_page">
    <div class="container">
        <h3 class="title">Noutati</h3>
        <div class="row">
            <div class="col-md-2">
                <span>{{ $post->present()->renderPublishedDate('j F') }}</span>
            </div>
            <div class="col-md-8">
                <h3>{{$post->name}}</h3>
                <img class="img-responsive" src="{{file_exists(public_path($post->image)) ? URL::to($post->image) : 'http://loremflickr.com/862/372/world,sport/all?random=100'}}" alt="">
                {!!$post->body!!}
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    @include('event.partials.js')
@endsection