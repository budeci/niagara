@extends('layout')
@section('content')
<section class="calcul">
    <div class="container">
        <h3 class="title">{{$meta->getMeta('calc_title')}}</h3>
        <h4>{{$meta->getMeta('calc_subtitle')}}</h4>
        <ul class="citrus_list">
            @foreach($category_food as $key => $category)           
                <li class="calcul_block">
                    <div class="calcul_img" style="background:url({{$category->image}}) no-repeat center center; background-size: cover;">
                        <div class="calcul_title"><span>{{$category->name}}</span></div>
                        <div class="calcul_description" style="display: none;">
                            <div class="calcul_title"><span>{{$category->name}}</span></div>
                            <div class="calcul_list">
                                @foreach($category->food->chunk(10) as $chunk)
                                    <ul class="citrus_products_list_items">
                                        @foreach ($chunk as $item)
                                            <li data-id="{{$item->id}}">{{$item->name}}</li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>  
            @endforeach
        </ul>

        <div class="calories-move">
            <div class="calories-move-step">
                <form action="{{ route('view_calories') }}" method="GET">
                    <input type="hidden" name="food" value="">
                    <input type="submit" value="{{$meta->getMeta('calc_submit')}}">
                </form>
            </div>
            <p class="calories-move-reset"><span class="js-calories-reset">{{$meta->getMeta('calc_destroy')}}</span></p>
        </div>

    </div>
</section>
@endsection

@section('js')
    @include('calc.partials.js-calc')
@endsection