@extends('layout')

@section('content')
<section class="mission">
    <div class="container">
        <h2 class="title">{!! $item->name !!}</h2>
        {!! $item->body !!}
    </div>
</section>
<section class="mission_block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <div class="for_mission_block">
                    {!! $item->left_block !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-6 ">
                <div class="for_mission_block">
                    {!! $item->right_block !!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="you_mission" style="background:url('{{str_replace("\\", "/",$item->image)}}')center no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 ">
                <h3>{!! $item->image_title !!}</h3>
            </div>
            <div class="col-md-4 col-sm-6 ">
                {!! $item->image_list !!}
            </div>
        </div>
    </div>
    </div>
</section>
@stop