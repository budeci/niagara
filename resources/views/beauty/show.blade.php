@extends('layout')

@section('content')

    <section class="first_section">
        <div class="container ">
            <h3 class="title">Beauty Spa</h3>
            <p>Pentru că una dintre valorile noastre este și frumusețea, vă propunem să beneficiați
                <br>în cadrul Niagara Fitness Club și de serviciile oferite în zona Beauty & Spa</p>
        </div>
    </section>
    <section class="beauty_center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 ">
                    <div class="first_section_block">
                        <p>Beauty SPA by World Class — это место, где не существует суеты — царит лишь приятная и расслабляющая атмосфера, создающая все условия, для того чтобы каждый посетитель провел время не только с пользой, но и с удовольствием</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 ">
                    <div class="first_slide">
                        @foreach($slide as $item)
                            <img class="img-responsive" src="{{$item->image}}" alt="{{$item->name}}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="beauty">
        <div class="container ">
            <h4 class="sub_title">Услуги Beauty SPA </h4>
            <div id="isotope_tab" class="pull-right filter-button-group">
                <button class="beauty_btn filter_active" data-filter="*">Toate</button>
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