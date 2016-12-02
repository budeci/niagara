@extends('layout')
@section('content')
<section class="treners_section">
    <div class="container">
        <h3>{{$service->name}}</h3>
        {!!$service->body!!}
        @if($service->image1 != '')
            <div class="slider_for_treners">
                <div class="treners_slide">
                    @if($service->image1 != '')
                        <div class="treners_slide_block" style="background:url({{$service->image1}}) no-repeat center center; background-size:cover;">
                            @if($service->annotation1 != '')
                                <div class="treners_slide_content">
                                    {{$service->annotation1}}
                                </div>
                            @endif
                        </div>
                    @endif
                    @if($service->image2 != '')
                        <div class="treners_slide_block" data-img="{{file_exists(public_path($service->image1))}}" style="background:url({{$service->image2}}) no-repeat center center; background-size:cover;">
                            @if($service->annotation2 != '')
                                <div class="treners_slide_content">
                                    {{$service->annotation2}}
                                </div>
                            @endif
                        </div>
                    @endif
                    @if($service->image3 != '')
                        <div class="treners_slide_block" style="background:url({{$service->image3}}) no-repeat center center; background-size:cover;">
                            @if($service->annotation3 != '')
                                <div class="treners_slide_content">
                                    {{$service->annotation3}}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <span class=" hidden-xs prev_tren"></span>
                <span class="hidden-xs next_tren"></span>
            </div>
        @endif
    </div>
</section>
@endsection

@section('js')
    @include('fitness.partials.js')
@endsection