@extends('layout')
@section('content')
    <section class="suport">
        <h1>{{$page->title}}</h1>
        <!--<img src="{{$page->image}}" class="wide_img">-->
        <div class="row content">
            <div class="col-lg-12">
                {!!$page->body!!}
            </div>
        </div>
    </section>
@endsection