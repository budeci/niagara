<div class="head_block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-4 ">
                <span class="for-phone">{{settings()->getOption('site::phone')}}</span>
                <div class="lang">

                    @if(isset($languages['other']))
                        @foreach($languages['other'] as $lang)
                        <a href="/{{ $lang->slug }}">{{$lang->slug}}</a>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-sm-8 hidden-xs">
                <ul class="for_aligne_head">
                    <li>
                        <button class=" pulsate" style="font-size: 20px;">{{$meta->getMeta('header_hot_offer')}}</button>
                    </li>
                    <li class="hidden-xs ">
                        <a href="{{ route('view_schedule') }}">
                        <img class="hidden-xs" src="/assets/images/ic1.png" alt="">Orar</a>
                    </li>
                    <li class="hidden-xs">
                        <button  data-target="#myModal2" data-toggle="modal">{{$meta->getMeta('header_call_me')}}</button>
                    </li>
                    <li class="hidden-xs">
                        <a href="{{route('contact_page')}}">{{$meta->getMeta('header_feadback')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="header_nav">
    <div class="container">
        <a class="header__logo" href="/"><img class="img-responsive" src="/assets/images/logo.png" alt=""></a>
        <div class="menu-collapsed_header">
            <div class="bar_header"></div>
            <!--a href="#" class="header__icon" id="header__icon"></a-->
            <ul class="menu">
                <li><a href="{{route('view_fitness_adult')}}">{{$meta->getMeta('header_fitness')}}</a></li>
                <li><a href="{{route('view_fitness_kids')}}">{{$meta->getMeta('head_kids_club')}}</a></li>
                <li><a href="{{route('view_membership')}}">{{$meta->getMeta('head_club_card')}}</a></li>
                <li><a href="{{route('beauty_show')}}">{{$meta->getMeta('head_spa_beauty')}}</a></li>
                <li><a href="{{route('view_world') }}">{{$meta->getMeta('head_world_niagara')}}</a></li>
                <li><a href="{{route('join_member')}}">{{$meta->getMeta('head_join')}}</a></li>
                <li class="visible-xs"><a href="">{{$meta->getMeta('head_orar')}}</a></li>
                <li class="visible-xs"><a href="">{{$meta->getMeta('header_hot_offer')}}</a></li>
                <li class="visible-xs"><a href="#" data-target="#myModal2" data-toggle="modal">{{$meta->getMeta('head_call_me')}}</a></li>
                <li class="visible-xs"><a href="{{route('contact_page')}}">{{$meta->getMeta('header_feadback')}}</a></li>
                <button class="for_btn" data-toggle="modal" data-target=".bs-example-modal-lg">{{$meta->getMeta('head_comand_tour')}}</button>
            </ul>
        </div>
    </div>
</header>