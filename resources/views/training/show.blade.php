@extends('layout')
@section('content')

<section class="fitness_article_bg" style="background: url({{file_exists(public_path($training->image)) && $training->image != '' ? URL::to($training->image) : 'http://loremflickr.com/1920/785/world,sport/all?random=100'}}) no-repeat top center;
    background-size: cover;">
    <div class="container">
        {!!$training->body!!}
    </div>
</section>

<section class="main_fitness_article">
    <div class="container">
        <h3>{{$meta->getMeta('training_single_title')}}</h3>
        <div class="row">
            @foreach($trainings_same as $item)
                <div class="col-md-3 col-sm-4 element-item {{$item->slug}}">
                    <div class="block_last_fitness">
                        <a href="{{ route('view_training', ['slug' => $item->slug]) }}">
                            <img class="img-responsive" src="{{file_exists(public_path($item->image)) ? Image::url($item->image,305,194,array('crop',false)) : 'http://loremflickr.com/305/194/world,sport/all?random=100'}}" alt="">
                            <h4>{{ $item->present()->renderTitle() }}</h4>
                        </a>
                        <div class="block_last_content">
                            {!! $item->present()->renderShortDescription(200) !!}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12" style="display: none;">
                <div class="for_fitnes_more">
                    <a href="/fitness_program.php">{{$meta->getMeta('training_single_show_more')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="last_fitnes_article">
    <div class="container">
        <h3>{{$meta->getMeta('training_single_clients')}}</h3>
        <div class="for_fitnes_more">
            <a href="">{{$meta->getMeta('training_single_paste_your_recall')}}</a>
        </div>
    </div>
</section>

@endsection

@section('js')
    @include('event.partials.js')
@endsection