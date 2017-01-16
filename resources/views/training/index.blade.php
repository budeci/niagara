@extends('layout')
@section('content')
<section class="first_fitness_program">
    <div class="container">
        <h3 class="title">{{$meta->getMeta('training_title')}}</h3>
        <div class="for_fitness_link">
            <div class="filter-button-group">
                <button class="is-checked" data-filter="*">{{$meta->getMeta('training_title')}}</button>
                @foreach($category_trainings as $category)
                    <button data-filter=".{{$category->slug}}">{{$category->name}}</button>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="last_fitness_program">
    <div class="clearfix"></div>
    <div class="container">
        <div class="row grid">
            @foreach($category_trainings as $category)
                @foreach($category->antrenament as $item)
                    <div class="col-md-3 col-sm-4 element-item {{$category->slug}}">
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
            @endforeach
            <div class="col-md-12">
                <button class="show_div" style="display: none">{{$meta->getMeta('training_show_more')}}</button>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    @include('home.partials.js')
@endsection