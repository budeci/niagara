@extends('layout')
@section('content')
<section class="news_article_page">
    <div class="container">
        <h3 class="title">Noutati</h3>
        <div class="row">
            <div class="col-md-2">
                <span>27 Июля</span>
            </div>
            <div class="col-md-8">
                <h3>Cupa Chișinăului la Squash</h3>
                <img class="img-responsive" src="/images/news_article.png" alt="">
                <p>Cunoscut drept un sport nobil, squashul este din ce în ce mai popular și în Republica Moldova. Anume din acest motiv, la cea de-a doua competiție națională de Squash au participat mai mulți doritori de a contribui la promovarea jocului în Moldova.Evenimentul a fost găzduit de „Niagara Fitness Club” în perioada 19-20 martie. În prima zi a competițiilor, pe data de 19 martie s-au dat lupte la LADY, Division A de la ora 9:00 dimineața. A doua zi au sportivii au concurat în Division B. În aceeași zi au avut loc și luptele finale pentru cele două divizii. Vezi AICI mai multe detalii despre antrenamentele de SQUASH.</p>
                <div class="for_news_print"> <img src="/images/ic_print.png" alt="">Descarca</div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    @include('event.partials.js')
@endsection