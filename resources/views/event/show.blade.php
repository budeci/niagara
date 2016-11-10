@extends('layout')
@section('content')
<section class="events_article_page" style="background: url({{file_exists(public_path($event->image)) && $event->image != '' ? URL::to($event->image) : 'http://loremflickr.com/1920/785/world,sport/all?random=100'}}) no-repeat center center; background-size: cover;">
    <div class="container">
        <h3>{{$event->name}}</h3>
        <span>{{ $event->present()->renderPublishedDate('d') }} - {{ $event->present()->renderExpiredDate('d F') }}</span>
    </div>
</section>

<section class="last_events_article">
    <ul class="for_events_article">
        <li class="active">
            <button data-toggle="tab" href="#events">О мероприятии</button>
        </li>
        <li>
            <button data-toggle="tab" href="#programs">Программа</button>
        </li>
        <!-- <li>
            <button data-toggle="tab" href="#foto">Фото и видео</button>
        </li> -->
    </ul>
    <div class="events_article_tab_content">
        <div class="container">
            <div class="tab-content">
                <div id="events" class="tab-pane fade  in active for_events_article_text ">
                    {!!$event->about!!}
                </div>
                <div id="programs" class="tab-pane fade   for_events_article_text ">
                    {!!$event->program!!}
                </div>
<!--                 <div id="foto" class="tab-pane fade for_events_article_text ">
    <h3>Программа для взрослых и детей от 7-ти лет.</h3>
    <ul>
        <li>Специальная цена на пакет «все включено» до 13-го июля!</li>
        <li>Взрослый — 156 590 руб.</li>
        <li>Ребенок (6-12лет) — 132 520 руб.</li>
    </ul>
    <h3>Расписание тренировок дли взрослых и детей (предварительно):</h3>
    <ul>
        <li>Утро 7.15 — 8.00</li>
        <li>День 10.00 — 13.00</li>
        <li>Вечер 16.30 — 18.00</li>
    </ul>
</div> -->
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    @include('event.partials.js')
@endsection