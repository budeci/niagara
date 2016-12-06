@extends('layout')
@section('content')
   <section class="abonamente">
    <div class="container">
    <h3>{{$meta->getMeta('membership_title')}}</h3>
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <p>{{$meta->getMeta('membership_info')}}</p>
            </div>
            <div class="col-md-6 col-sm-6 ">
                <div class="row abonamente_block">
                    <div class="col-md-6  col-sm-6 col-xs-6">
                        <a href=""><img class="img-responsive" src="/assets/images/pdf1.png" alt="">{{$meta->getMeta('membership_form')}}</a>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <a href=""><img class="img-responsive" src="/assets/images/pdf1.png" alt="">{{$meta->getMeta('membership_club')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="parteneriat">
    <div class="container">
        <h4>{{$meta->getMeta('membership_partners')}}</h4>
        <!-- <ul>
            <li>
               <button id="btnCard" ><img src="/assets/images/1.jpg" alt=""></button>
                <h5>STANDARD</h5>
            </li>
            <li>
                <img src="/assets/images/1.jpg" alt="">
                <h5>OFF PEAK</h5>
            </li>
            <li>
                <img src="/assets/images/1.jpg" alt="">
                <h5>WEEKEND</h5>
            </li>
            <li>
                <img src="/assets/images/1.jpg" alt="">
                <h5>WEEKEND PLUS</h5>
            </li>
            <li>
                <img src="/assets/images/1.jpg" alt="">
                <h5>LATE EVENING</h5>
            </li>
        </ul> -->
        <div class="row">
            @foreach($category_membership as $key => $category)
                <div class="col-md-2">
                    <button data-toggle="modal" data-target="#card{{$key}}"><img src="{{$category->ico}}" alt=""></button> 
                    <h5>{{$category->name}}</h5>
                </div>
            @endforeach
        </div>
        <a href="" data-target="#myModal2" data-toggle="modal">{{$meta->getMeta('membership_get_call')}}</a>
    </div>
    </div>
</section>
<section class="cartele">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <div class="cartele_block">
                    <h4>{{$meta->getMeta('membership_card_title')}}</h4>
                    <h5>{{$meta->getMeta('membership_card_subtitle')}}</h5>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 ">
                @if(!$slides->isEmpty())
                    <div class="cartele_contain">
                        <div class="cartele_slide">
                            @foreach($slides as $item)
                                @if(file_exists(public_path($item->image)))
                                    <img class="img-responsive" src="{{Image::url($item->image,680,440,array('crop',false))}}" alt="{{$item->name}}">
                                @endif
                            @endforeach
                        </div>
                     </div>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="cartele_oferts">
    <div class=" container ">
        <h3>{!! $meta->getMeta('membership_card_offerts_title') !!}</h3>
        <ul>
            @foreach($privilege as $key => $item)
                <li>
                    <div class="cartele_oferts_block">
                        <img class="img-responsive" src="{{$item->image}}" alt="">
                        <span>{{$item->name}}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
<section class="cartele_last">
    <div class=" container ">
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <div class="cartele_last_block">
                    <h3>{!! $meta->getMeta('membership_questions') !!}</h3>
                    <ul>
                        @foreach($faq as $item)
                            <li><a href="{{route('view_faq')}}#tab{{$item->id}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                    <a href="">{!! $meta->getMeta('membership_all_questions') !!}</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="cartele_last_contain">
                    <h3>{!! $meta->getMeta('membership_info_block_title') !!}</h3>
                    <p>{!! $meta->getMeta('membership_info_block_body') !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

    @foreach($category_membership as $key => $category) 
      <!-- Modal Cartele -->
        <div id="card{{$key}}" class="modal modals card-modal fade" role="dialog">
            <!-- Modal content -->
            <div class="modals-contents">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="head_modal">
                    <div class="head_modal_block">
                        <img src="{{$category->ico}}" alt="">
                        <h3>{{$category->name}}</h3>
                    </div>
                    <h4>{{$category->available}}</h4>
                    <a href="{{route('call_page',['id'=>$category->id,'slug'=>str_slug($category->name)])}}">{!! $meta->getMeta('membership_comand_call') !!}</a>
                </div>
                <div class="body-modal-content">
                    {!!$category->description!!}
                    @foreach($category->membership->chunk(3) as $chunk)
                        <div class="row">
                            @foreach ($chunk as $item)
                                <div class="col-md-4">
                                    <div class="modal_content_block">
                                        <img src="{{$item->ico}}" alt="">
                                        <h4>{{$item->name}}</h4>
                                        {!!$item->body!!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('css')

@endsection

@section('js')
    @include('membership.partials.js')
@endsection