@extends('layout')
@section('content')
   <section class="abonamente">
    <div class="container">
    <h3>Абонементы Niagara Fitness</h3>
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <p>Приобретая клубную карту, вы становитесь членом клуба Niagara Fitness со всеми возможностями и привилегиями. Клубная карта позволяет посещать тренажерный зал, бассейн и более 50 специально отобранных групповых программ: программы Les Mills, антигравити-йогу, пилатес, танцевальные классы, спортивные секции, боевые искусства, - а также иметь доступ к насыщенной спортивной и светской жизни Niagara Fitness, тематическим фитнес-турам и занятиям Outdoor.</p>
            </div>
            <div class="col-md-6 col-sm-6 ">
                <div class="row abonamente_block">
                    <div class="col-md-6  col-sm-6 col-xs-6">
                        <a href=""><img class="img-responsive" src="/assets/images/pdf1.png" alt="">Типовая форма контракта</a>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <a href=""><img class="img-responsive" src="/assets/images/pdf1.png" alt="">Правила посещения клубов</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="parteneriat">
    <div class="container">
        <h4>Виды членства</h4>
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
        <a href="" data-target="#myModal2" data-toggle="modal">Заказать обратный звонок</a>
    </div>
    </div>
</section>
<section class="cartele">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <div class="cartele_block">
                    <h4>Хотите заниматься в клубах Niagara Fitness по особой цене?</h4>
                    <h5>Следите за спецпредложениями на нашем сайте и приобретайте годовые фитнес-карты с полным набором услуг со скидкой.</h5>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 ">
                <div class="cartele_contain">
                    <div class="cartele_slide">
                        <img class="img-responsive" src="/assets/images/first1.jpg" alt="">
                        <img class="img-responsive" src="/assets/images/first1.jpg" alt="">
                        <img class="img-responsive" src="/assets/images/first1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cartele_oferts">
    <div class=" container ">
        <h3>Привилегии для владельцев любой клубной<br> карты Niagara Fitness</h3>
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
                    <h3>Частые вопросы</h3>
                    <ul>
                        @foreach($faq as $item)
                            <li><a href="{{route('view_faq')}}#tab{{$item->id}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                    <a href="">Все вопросы</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="cartele_last_contain">
                    <h3>Преимущества Niagara Fitness</h3>
                    <p>Niagara Fitness — крупнейшая фитнес-корпорация в Молдове, признанный лидер по оказанию фитнес-услуг в сегментах «люкс» и «премиум».
                        <br>
                        <br>На протяжении многих лет Niagara Fitness является членом IHRSA международной ассоциации, объединяющей ведущие мировые фитнес-клубы. В 2014 году сеть Niagara стала поставщиком в категории «Услуги для фитнеса».</p>
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
                    <a href="{{route('call_page',['id'=>$category->id,'slug'=>str_slug($category->name)])}}">Comanda apel</a>
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