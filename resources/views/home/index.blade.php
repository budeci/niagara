@extends('layout')
@section('content')
    <section class="news">
        <div class=" container ">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="content_slide">
                        <div class="news_slide">
                            <div class="item"><img src="/assets/images/slide1.jpg" alt=""></div>
                            <div class="item"><img src="/assets/images/slide1.jpg" alt=""></div>
                            <div class="item"><img src="/assets/images/slide1.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 news_block">
                    <div class="content_slide">
                        <div class="for_new">
                            <a href="">
                                <div class="for_new_block">
                                    <span><strong>02</strong> май - <strong>12</strong> май</span>
                                    <h3>Благотворительный Забег <br>“Помощь Детям”</h3>
                                </div>
                                <img class="img-responsive" src="/assets/images/1.jpg" alt="">
                            </a>
                        </div>
                        <div class="for_new">
                            <a href="">
                                <div class="for_new_block">
                                    <span><strong>20</strong> май - <strong>25</strong> май</span>
                                    <h3>Фитнес-тур Niagara Fitness Club “Быстрее, Выше, Сильнее”</h3>
                                </div>
                                <img class="img-responsive" src="/assets/images/2.jpg" alt="">
                            </a>
                        </div>
                        <div class="for_new">
                            <a href="">
                                <div class="for_new_block">
                                    <span><strong>12</strong> май - <strong>15</strong> май</span>
                                    <h3>Интенсивный тренировочный сбор по триатлону в Niagara</h3>
                                </div>
                                <img class="img-responsive" src="/assets/images/3.jpg" alt="">
                            </a>
                        </div>
                        <div class="for_new ">
                            <a href="">
                                <div class="for_new_block">
                                    <span><strong>26</strong> май - <strong>30</strong> май</span>
                                    <h3>Мастер-класс по<br>Кик-Боксингу</h3>
                                </div>
                                <img class="img-responsive" src="/assets/images/4.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news_niagara">
        <div class="container">
            <h4 class="sub_title">Noutati Niagara Fitness
            <a data-toggle="modal" data-target=".abonare_modal" href=""><img src="/assets/images/ic3.png" alt="">Aboneaza-te la noutati</a>
            </h4>
            <div class="row">
                <div class="news_niagara_slide">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="news_niagara_block">
                            <a href="/news_article.php">Cupa Chișinăului la Squash</a>
                            <span>20 Aprilie</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="news_niagara_block">
                            <a href="">Aleargă și câștigă! Trei Club Carduri „Niagara Fitness Club” vor fi oferite gratuit</a>
                            <span>20 Aprilie</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="news_niagara_block">
                            <a href="">Împreună cream o viață mai bună</a>
                            <span>20 Аprilie</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="news_niagara_block">
                            <a href="">Competiția de Înot „Peștișorul de Aur” Ediția de vară</a>
                            <span>20 Mai</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="news_niagara_block">
                            <a href="">Competiția de Fotbal „Tată Fiu” Ediția de vară</a>
                            <span>20 Mai</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="news_niagara_block">
                            <a href="">Fitness Tour Rimini Wellness</a>
                            <span>20 Iunie</span>
                        </div>
                    </div>
                </div>
                <div class=" hidden-xs hidden-sm prev"></div>
                <div class=" hidden-xs hidden-sm next"></div>
            </div>
            <div class="news_niagara_link">
                <a href="/news.php">Toate noutatile</a></div>
            </div>
        </div>
    </section>
    <section class="events">
        <h4 class="sub_title">Evenimente</h4>
        <div class="index_center_slide_border"></div>
        <div class="index_center_slide">
            <div class="events_block">
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="/events_article.php">
                    <span>28 - 12</span>
                    <h5>Martie</h5>
                    <h4>Cupa Chișinăului <br>la Squash</h4>
                </a>
            </div>
            <div class="events_block">
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="/events_article.php">
                    <span>28 - 12</span>
                    <h5>Aprilie</h5>
                    <h4>Aleargă și câștigă</h4>
                </a>
            </div>
            <div class="events_block">
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="/events_article.php">
                    <span>28 - 12</span>
                    <h5>Aprilie</h5>
                    <h4>Împreună cream o viață mai bună</h4>
                </a>
            </div>
            <div class="events_block">
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="/events_article.php">
                    <span>28 - 12</span>
                    <h5>Mai</h5>
                    <h4>Competiția de Înot „Peștișorul de Aur” Ediția de vară</h4>
                </a>
            </div>
            <div class="events_block">
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="/events_article.php">
                    <span>28 - 12</span>
                    <h5>Mai</h5>
                    <h4>Competiția de Fotbal „Tată Fiu” Ediția de vară</h4>
                </a>
            </div>
            <div class="events_block">
                <div class="events_for_img ">
                    <img src="/assets/images/slider/1.jpg " alt=" ">
                </div>
                <a href=/events_article.php ">
                    <span>28 - 12</span>
                    <h5>Iunie</h5>
                    <h4>Fitness Tour Rimini Wellness </h4>
                </a>
            </div>
            <div class="events_block ">
                <div class="events_for_img ">
                    <img src="/assets/images/slider/1.jpg " alt=" ">
                </div>
                <a href="/events_article.php ">
                    <span>28 - 12</span>
                    <h5>Iunie</h5>
                    <h4>Deschiderea Taberei de vară și Sărbătoarea Copiilor </h4>
                </a>
            </div>
            <div class="events_block ">
                
                <div class="events_for_img ">
                    <img src="/assets/images/slider/1.jpg " alt=" ">
                </div>
                <a href=" ">
                    <span>28 - 12</span>
                    <h5>Iunie</h5>
                    <h4>"CUPA CHIȘINĂU 2016” pe ritmuri de SQUASH, ediția a II-a </h4>
                </a>
            </div>
            <div class="events_block">
                
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="">
                    <span>28 - 12</span>
                    <h5>Iunie</h5>
                    <h4>Seminar de Înot  În apă deschisă</h4>
                </a>
            </div>
            <div class="events_block">
                
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="">
                    <span>28 - 12</span>
                    <h5>Iunie</h5>
                    <h4>Prima ediție a Taberei de vară a luat sfârșit </h4>
                </a>
            </div>
            <div class="events_block">
                
                <div class="events_for_img">
                    <img src="/assets/images/events/1.jpg" alt="">
                </div>
                <a href="">
                    <span>28 - 12</span>
                    <h5>Iulie</h5>
                    <h4>Antrenamente noi la Niagata: X-FIT și BODYROCK </h4>
                </a>
            </div>
            <div class="events_block">
                
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="">
                    <span>28 - 12</span>
                    <h5>Iulie</h5>
                    <h4>Sea Mile 2016 17 iulie</h4>
                </a>
            </div>
            <div class="events_block">
                
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="">
                    <span>28 - 12</span>
                    <h5>Iulie</h5>
                    <h4>Campionatul „Tenis Summer Kids 2016”</h4>
                </a>
            </div>
            <div class="events_block">
                
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="">
                    <span>28 - 12</span>
                    <h5>Iulie</h5>
                    <h4>Încheierea Taberei de Vară Ediția II </h4>
                </a>
            </div>
            <div class="events_block">
                
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="">
                    <span>28 - 12</span>
                    <h5>August</h5>
                    <h4>Campionatul pentru copii la SQUASH</h4>
                </a>
            </div>
            <div class="events_block">
                <div class="events_for_img">
                    <img src="/assets/images/slider/1.jpg" alt="">
                </div>
                <a href="">
                    <span>28 - 12</span>
                    <h5>August</h5>
                    <h4>Campionatul de vară la înot pentru amatori și veterani</h4>
                </a>
            </div>
        </div>
        <a href="/events.php">Toate evenimentele si competitiile</a>
    </section>
    <section class="home_main">
        <div class=" container ">
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane " id="nav1">
                    <img src="/assets/images/ic2.png" alt="">
                    <h3>Fitness</h3>
                    <p>Niagara Fitness club - unicul loc în Chișinău ce oferă o gamă largă de servicii
                        necesare pentru menținerea formei fizice a corpului într-o stare perfectă. Mai mult
                        de 10 ani în lumea fitness-ului Niagara Fitness Club s-a preocupat în permanență de dotarea
                    sălilor cu cele mai moderne tehnologii existente pe piață.</p>
                </div>
                <div class="tab-pane" id="nav2">
                    <img src="/assets/images/ic2.png" alt="">
                    <h3>Фитнеc</h3>
                    <p>Сеть фитнес-клубов Niagara на протяжении 10 лет является
                        <br> признанным экспертом и лидером в области фитнеса в Модове.
                        <br> В клубах Niagara Fitness представлено более 50 специально
                        <br> отобранных программ а так же авторские методики,
                    <br> разработанные экспертами Niagara.</p>
                </div>
                <div class="tab-pane" id="nav3">
                    <img src="/assets/images/ic2.png" alt="">
                    <h3>Фитнеc</h3>
                    <p>Сеть фитнес-клубов Niagara на протяжении 10 лет является
                        <br> признанным экспертом и лидером в области фитнеса в Модове.
                        <br> В клубах Niagara Fitness представлено более 50 специально
                        <br> отобранных программ а так же авторские методики,
                    <br> разработанные экспертами Niagara.</p>
                </div>
                <div class="tab-pane active" id="nav4">
                    <img src="/assets/images/ic2.png" alt="">
                    <h3>Фитнеc</h3>
                    <p>Сеть фитнес-клубов Niagara на протяжении 10 лет является
                        <br> признанным экспертом и лидером в области фитнеса в Модове.
                        <br> В клубах Niagara Fitness представлено более 50 специально
                        <br> отобранных программ а так же авторские методики,
                    <br> разработанные экспертами Niagara.</p>
                </div>
                <div class="tab-pane" id="nav5">
                    <img src="/assets/images/ic2.png" alt="">
                    <h3>Фитнеc</h3>
                    <p>Сеть фитнес-клубов Niagara на протяжении 10 лет является
                        <br> признанным экспертом и лидером в области фитнеса в Модове.
                        <br> В клубах Niagara Fitness представлено более 50 специально
                        <br> отобранных программ а так же авторские методики,
                    <br> разработанные экспертами Niagara.</p>
                </div>
                <div class="tab-pane" id="nav6">
                    <img src="/assets/images/ic2.png" alt="">
                    <h3>Фитнеc</h3>
                    <p>Сеть фитнес-клубов Niagara на протяжении 10 лет является
                        <br> признанным экспертом и лидером в области фитнеса в Модове.
                        <br> В клубах Niagara Fitness представлено более 50 специально
                        <br> отобранных программ а так же авторские методики,
                    <br> разработанные экспертами Niagara.</p>
                </div>
                <div class="tab-pane" id="nav7">
                    <img src="/assets/images/ic2.png" alt="">
                    <h3>Фитнеc</h3>
                    <p>Сеть фитнес-клубов Niagara на протяжении 10 лет является
                        <br> признанным экспертом и лидером в области фитнеса в Модове.
                        <br> В клубах Niagara Fitness представлено более 50 специально
                        <br> отобранных программ а так же авторские методики,
                    <br> разработанные экспертами Niagara.</p>
                </div>
            </div>
            <ul id="tabs" class="nav_main" data-tabs="tabs">
                <li class="active">
                    <a href="#nav1" data-toggle="tab">
                        <div class="nav_main_img">
                            <img src="/assets/images/main/1.png">
                        </div>
                    <h5>Loialitate</h5></a>
                </li>
                <li>
                    <a href="#nav2" data-toggle="tab">
                        <div class="nav_main_img ">
                            <img src="/assets/images/main/2.png">
                        </div>
                        <h5>Recunoaștere</h5>
                    </a>
                </li>
                <li>
                    <a href="#nav3" data-toggle="tab">
                        <div class="nav_main_img">
                            <img src="/assets/images/main/3.png">
                        </div>
                        <h5>Premii</h5>
                    </a>
                </li>
                <li>
                    <a href="#nav4" data-toggle="tab">
                        <div class="nav_main_img tab-active">
                            <img src="/assets/images/main/4.png">
                        </div>
                        <h5>Programe-fitness</h5>
                    </a>
                </li>
                <li>
                    <a href="#nav5" data-toggle="tab">
                        <div class="nav_main_img">
                        <img src="/assets/images/main/5.png"></div>
                        <h5>Bonusuri</h5>
                    </a>
                </li>
                <li>
                    <a href="#nav6" data-toggle="tab">
                        <div class="nav_main_img">
                            <img src="/assets/images/main/6.png">
                        </div>
                        <h5>Calitate</h5>
                    </a>
                </li>
                <li>
                    <a href="#nav7" data-toggle="tab">
                        <div class="nav_main_img">
                        <img src="/assets/images/main/7.png"></div>
                    <h5>Profesionalism</h5></a>
                </li>
            </ul>
        </div>
    </section>
    <section class="section_video hidden-sm hidden-xs ">
        <div class="container">
            <h3>Видео</h3>
            <div class="center_carousel">
                <div id="carousel">
                    <a id="" href="#"><img class="img-responsive" src="/assets/images/slide_play.jpg" /></a>
                    <a id="" href="#"><img class="img-responsive" src="/assets/images/slide_play.jpg" /></a>
                    <a id="" href="#"><img class="img-responsive" src="/assets/images/slide_play.jpg" /></a>
                    <a id="" href="#"><img class="img-responsive" src="/assets/images/slide_play.jpg" /></a>
                </div>
            </div>
        </div>
    </section>
    <section class="last_section">
        <div class=" container ">
            <img src="/assets/images/logo2.png" alt="">
            <h3>Познайте и раскройте мир
            <strong>Niagara Fitness</strong>
            </h3>
            <a href="/enter_club.php"><img src="/assets/images/btn1.png" alt=""> Присоедениться
            </a>
        </div>
    </section>
    <!--Modal-->
    <div class="modal fade abonare_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm ">
            <div class="modal-content abonare_content">
                <h3>Aboneaza-te la noutati</h3>
                <h4>Lasa-ti adresa electronica, pentru a fi inregistrata abonarea</h4>
                <form>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" >
                    </div>
                    <input type="submit" value="Trimite" >
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('home.partials.js')
@endsection