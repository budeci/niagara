@extends('layout')

@section('content')
<section class="news_article_page">
    <div class="container">
        <h3 class="title">{{$meta->getMeta('lifestyle_posts')}}</h3>
        <div class="row">
            <div class="col-md-2">
                <span>{!! $lifestyle->present()->renderDate('d F') !!}</span>
            </div>
            <div class="col-md-8">
                <h3>{!! $lifestyle->name !!}</h3>
               {!! ($lifestyle->image) ? '<img class="img-responsive" src='.$lifestyle->image.' alt="">' : ''  !!}
                <p>{!! $lifestyle->body !!}</p>
                {{--<div class="for_news_print">
                    <a href=""><img src="/assets/images/ic_print.png" alt="">Descarca</a>
                </div>--}}
            </div>
        </div>
    </div>
</section>
@endsection