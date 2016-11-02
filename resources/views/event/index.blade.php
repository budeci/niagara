@extends('layout')
@section('content')
    <section class="for_events_main">
        <div class="container">
            <h3 class="title">Мероприятия и соревнования</h3>
            <div class="filters for_events_tab">
                <div class="ui-group">
                    <div class="button-group js-radio-button-group" data-filter-group="category">
                        <button class="button is-checked" data-filter="">Все</button>
                        <button class="button" data-filter=".spa">Beauty SPA</button>
                        <button class="button" data-filter=".outdoor">Outdoor</button>
                        <button class="button" data-filter=".svet">Светские</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="filters for_events_tab_center">
        <div class="container">
            
            <div class=" ui-group">
                <div class="button-group js-radio-button-group" data-filter-group="filtr">
                    <button class="button is-checked" data-filter="*">Все</button>
                    <button class="button " data-filter=".soon">Ближайшие</button>
                    <button class="button" data-filter=".past">Прошедшие</button>
                </div>
            </div>
            
            <div class="row grid-item">
                <div class="col-md-3 col-sm-6 data-item  soon spa">
                    <div class="events_block_tab">
                        <div class="for_events_head">
                            <img src="/images/events.png" alt="">
                        </div>
                        <div class="events_cotent">
                            <a href="/events_article.php">Фитнес-тур World Class «Лучше гор могут быть только горы!»</a>
                            <p>13 Августа 2016 - 20 Августа 2016<br><br>
                            Фитнес-тур World Class «Лучше гор могут быть только горы!»</p>
                        </div>
                        <div class="for_pin_events">
                            <img class="img-resposive" src="/images/pink.png" alt="">
                            <h4> Club Med Pragelato Vialattea, Италия</h4>
                        </div>
                        <h5>Club Med Pragelato Vialattea — Итальянская dolce vita у подножия Альп! Добр...</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 data-item past spa">
                    <div class="events_block_tab">
                        <div class="for_events_head">
                            <img src="/images/events.png" alt="">
                        </div>
                        <div class="events_cotent">
                            <a href="/events_article.php">Фитнес-тур World Class «Лучше гор могут быть только горы!»</a>
                            <p>13 Августа 2016 - 20 Августа 2016<br><br>
                            Фитнес-тур World Class «Лучше гор могут быть только горы!»</p>
                        </div>
                        <div class="events_block_tab_border"></div>
                        <div class="for_pin_events">
                            <img class="img-resposive" src="/images/pink.png" alt="">
                            <h4> Club Med Pragelato Vialattea, Италия</h4>
                        </div>
                        <h5>Club Med Pragelato Vialattea — Итальянская dolce vita у подножия Альп! Добр...</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 data-item  past spa">
                    <div class="events_block_tab">
                        <div class="for_events_head">
                            <img src="/images/events.png" alt="">
                        </div>
                        <div class="events_cotent">
                            <a href="/events_article.php">Фитнес-тур World Class «Лучше гор могут быть только горы!»</a>
                            <p>13 Августа 2016 - 20 Августа 2016<br><br>
                            Фитнес-тур World Class «Лучше гор могут быть только горы!»</p>
                        </div>
                        <div class="for_pin_events">
                            <img class="img-resposive" src="/images/pink.png" alt="">
                            <h4> Club Med Pragelato Vialattea, Италия</h4>
                        </div>
                        <h5>Club Med Pragelato Vialattea — Итальянская dolce vita у подножия Альп! Добр...</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 data-item  past spa">
                    <div class="events_block_tab">
                        <div class="for_events_head">
                            <img src="/images/events.png" alt="">
                        </div>
                        <div class="events_cotent">
                            <a href="/events_article.php">Фитнес-тур World Class «Лучше гор могут быть только горы!»</a>
                            <p>13 Августа 2016 - 20 Августа 2016<br><br>
                            Фитнес-тур World Class «Лучше гор могут быть только горы!»</p>
                        </div>
                        <div class="for_pin_events">
                            <img class="img-resposive" src="/images/pink.png" alt="">
                            <h4> Club Med Pragelato Vialattea, Италия</h4>
                        </div>
                        <h5>Club Med Pragelato Vialattea — Итальянская dolce vita у подножия Альп! Добр...</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 data-item  soon outdoor">
                    <div class="events_block_tab">
                        <div class="for_events_head">
                            <img src="/images/events.png" alt="">
                        </div>
                        <div class="events_cotent">
                            <a href="/events_article.php">Фитнес-тур World Class «Лучше гор могут только горы!»</a>
                            <p>13 Августа 2016 - 20 Августа 2016<br><br>
                            Фитнес-тур World Class «Лучше гор могут быть только горы!»</p>
                        </div>
                        <div class="for_pin_events">
                            <img class="img-resposive" src="/images/pink.png" alt="">
                            <h4> Club Med Pragelato Vialattea, Италия</h4>
                        </div>
                        <h5>Club Med Pragelato Vialattea — Итальянская dolce vita у подножия Альп! Добр...</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 data-item  past outdoor">
                    <div class="events_block_tab">
                        <div class="for_events_head">
                            <img src="/images/events.png" alt="">
                        </div>
                        <div class="events_cotent">
                            <a href="/events_article.php">Фитнес-тур World Class «Лучше гор могут быть только горы!»</a>
                            <p>13 Августа 2016 - 20 Августа 2016<br><br>
                            Фитнес-тур World Class «Лучше гор могут быть только горы!»</p>
                        </div>
                        <div class="for_pin_events">
                            <img class="img-resposive" src="/images/pink.png" alt="">
                            <h4> Club Med Pragelato Vialattea, Италия</h4>
                        </div>
                        <h5>Club Med Pragelato Vialattea — Итальянская dolce vita у подножия Альп! Добр...</h5>
                    </div>
                </div>
                <div class="col-md-12" style="display: none;">
                    <button class="show_div">Показать ещё</button>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection

@section('js')
    @include('home.partials.js')
@endsection