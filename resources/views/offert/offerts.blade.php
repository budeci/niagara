@extends('layout')

@section('content')
    <section class="special_oferts_section">
        <div class="container">
            <h3 class="title">Специальные предложения</h3>
            <div class="row">
                @foreach($offert as $item)
                <div class="col-md-6 col-sm-6 special_oferts_block">
                    <a href="{{route('show_ofert',['slug'=>$item->slug])}}">
                        <img src="{{$item->image}}" alt="">
                        <span>до {{ $item->present()->renderExpiredDate() }}</span>
                        <div class="special_oferts_contain">
                            <h4>{!! $item->name !!}</h4>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection