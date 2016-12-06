@extends('layout')

@section('content')

    <section class="first_section">
        <div class="container ">
            <h3 class="title">{{$meta->getMeta('page_beauty_spa_title')}}</h3>
            <p>{!! $meta->getMeta('page_beauty_spa_subtitle') !!}</p>
        </div>
    </section>
    <section class="beauty_center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 ">
                    <div class="first_section_block">
                        <p>{!! $meta->getMeta('page_beauty_spa_info') !!}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 ">
                    @if(!$slides->isEmpty())
                        <div class="first_slide">
                            @foreach($slides as $item)
                                @if(file_exists(public_path($item->image)))
                                    <img class="img-responsive" src="{{Image::url($item->image,680,440,array('crop',false))}}" alt="{{$item->name}}">
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="beauty">
        <div class="container ">
            <h4 class="sub_title">{!! $meta->getMeta('beauty_spa_filters_title') !!}</h4>
            <div id="isotope_tab" class="pull-right filter-button-group">
                <button class="beauty_btn filter_active" data-filter="*">{!! $meta->getMeta('beauty_spa_filters_all') !!}</button>
                @foreach($category as $item)
                    <button class="beauty_btn" data-filter=".{{$item->id}}">{!! $item->name !!}</button>
                @endforeach
            </div>
            <div class="clearfix"></div>
            <div class="row grid">
                @foreach($posts as $item)
                    <div class="col-md-3 col-sm-4  element-item {{$item->category_id}}">
                        <div class="thumbnail">
                            <div class="beauty_for_img">
                                <img class="img-responsive" src="{{$item->image}}" alt="">
                            </div>
                            <div class="caption">
                                <h4>{!! $item->name !!}</h4>
                                <p>{!! $item->body !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $('#isotope_tab button').click(function() {
            $('#isotope_tab button').removeClass("filter_active");
            $(this).addClass("filter_active");
        })
    </script>
@endsection