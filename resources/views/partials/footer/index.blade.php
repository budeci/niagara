<!-- </div> -->
<section class="faq">
    <div class="container">
        <a href="{{route('view_faq')}}">{{$meta->getMeta('footer_faq')}}</a>
    </div>
</section>
<footer>
    <div class="container">
        <h3>{{$meta->getMeta('footer_title')}}</h3>
        <img src="/assets/images/line.png" alt="">
        <div class="row">
            <div class=" col-md-12 footer_links">
                <div class="menu-collapsed_footer">
                    <div class="bar_footer"></div>
                    <ul class="col-md-2 col-sm-4 ">
                        <li><a>{{$meta->getMeta('footer_menu_club')}}</a></li>
                        <li><a href="{{route('mission_page')}}">{{$meta->getMeta('footer_menu_mission')}}</a></li>
                        <li><a href="{{route('view_team')}}">{{$meta->getMeta('footer_menu_administration')}}</a></li>
                        <li><a href="{{route('view_partner') }}">{{$meta->getMeta('footer_menu_partners')}}</a></li>
                        <li><a href="{{route('advertisement_page')}}">{{$meta->getMeta('footer_menu_publish')}}</a></li>
                        <li><a href="{{route('press_show')}}">{{$meta->getMeta('footer_menu_press')}}</a></li>
                        <li><a href="{{route('vacancy_show')}}">{{$meta->getMeta('footer_menu_posts')}}</a></li>
                        <li><a href="{{route('contact_page')}}">{{$meta->getMeta('footer_menu_contacts')}}</a></li>
                    </ul>
                    <ul class="col-md-2  col-sm-4 ">
                        <li><a>{{$meta->getMeta('footer_menu_fitnes')}}</a></li>
                        <li><a href="{{route('view_trainings')}}">{{$meta->getMeta('footer_menu_training_fitnes')}}</a></li>
                        <li><a href="{{route('view_fitness_adult')}}">{{$meta->getMeta('footer_menu_choice_program')}}</a></li>
                        <li><a href="{{route('show_trener_page',['static_page'=>'fitnes-with-personal-trener'])}}">{{$meta->getMeta('footer_menu_personal_training')}}</a></li>
                        {{--<li><a href="">Zone de antrenament</a></li>
                        <li><a href="">Aqua Zone</a></li>
                        <li><a href="">Fitness testare</a></li>--}}
                        <li><a href="{{ route('view_calc') }}">{{$meta->getMeta('footer_menu_calculator')}}</a></li>
                    </ul>
                    <ul class="col-md-2  col-sm-4 ">
                        <li><a>{{$meta->getMeta('footer_menu_kids_club')}}</a></li>
                        <li><a href="{{route('view_trainings_kids')}}">{{$meta->getMeta('footer_menu_kids_training')}}</a></li>
                        <li><a href="{{route('view_fitness_kids')}}">{{$meta->getMeta('footer_menu_choice_program')}}</a></li>
                        <li><a href="{{route('show_trener_page',['static_page'=>'fitnes-with-personal-trener'])}}">{{$meta->getMeta('footer_menu_personal_training')}}</a></li>
                    {{--    <li><a href="">Studiouri</a></li>
                        <li><a href="">Clase de creație</a></li>
                        <li><a href="">Tabăra de Vară</a></li>
                        <li><a href="">Fitness Testare</a></li>--}}
                    </ul>
                    <ul class="col-md-2  col-sm-4 ">
                        <li><a>{{$meta->getMeta('footer_menu_club_crads')}}</a></li>
                        <li><a href="{{route('view_membership')}}">{{$meta->getMeta('footer_menu_choise_card')}}</a></li>
                       <!--  <li><a href="">Carduri Corporative</a></li>
                       <li><a href="">Program de Loialitate</a></li> -->
                        <li><a href="{{route('show_oferts')}}">{{$meta->getMeta('footer_menu_offerts')}}</a></li>
                        <li><a href="{{route('view_all_partners')}}">{{$meta->getMeta('footer_menu_privilegies_of_partners')}}</a></li>
                        <li><a href="{{route('show_page',['static_page'=>'terms-and-conditions'])}}">{{$meta->getMeta('footer_menu_reglament')}}</a>
                        </li>
                    </ul>
                    <ul class="col-md-2  col-sm-4 ">
                        <li><a>{{$meta->getMeta('footer_menu_beauty_spa')}}</a></li>
                        <li><a href="{{route('beauty_show')}}">{{$meta->getMeta('footer_menu_salon_beauty')}}</a></li>
                       {{-- <li><a href="">Cosmetologia Feței</a></li>
                        <li><a href="">Cosmetologia Corpului</a></li>
                        <li><a href="">Cosmetologie cu Laser</a></li>
                        <li><a href="">Masaj</a></li>
                        <li><a href="">Peeling</a></li>
                        <li><a href="">Solar</a></li>
                        <li><a href="">Saune</a></li>--}}
                    </ul>
                    <ul class="col-md-2  col-sm-4 ">
                        <li><a>{{$meta->getMeta('footer_menu_world_niagara')}}</a></li>
                        <li><a href="{{route('view_news')}}">{{$meta->getMeta('footer_menu_news')}}</a></li>
                        <li><a href="{{route('view_events')}}">{{$meta->getMeta('footer_menu_events')}}</a></li>
                        <li><a href="{{route('life_style')}}">{{$meta->getMeta('footer_menu_life_style')}}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <div class="footer_social">
                    <ul>
                        <li><a href="{{settings()->getOption('social::twitter')}}" target="_blank"><img class="img-responsive" src="/assets/images/social1.png" alt=""></a></li>
                        <li><span class="footer_content_bord"> </span></li>
                        <li><a href="{{settings()->getOption('social::facebook')}}" target="_blank"><img class="img-responsive" src="/assets/images/social2.png" alt=""></a></li>
                        <li><span class="footer_content_bord"></span></li>
                        <li><a href="{{settings()->getOption('social::linkedin')}}" target="_blank"><img class="img-responsive" src="/assets/images/social3.png" alt=""></a></li>
                    </ul>
                    <p>{{$meta->getMeta('footer_copyright')}}</p>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- </div>
</div> -->
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content my_modal">
            <div class="modal_head">
                <h3>{{$meta->getMeta('form_tour_title')}}</h3>
                <div class="modal_line"></div>
            </div>
            <div class="my_content">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">{{$meta->getMeta('form_name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">{{$meta->getMeta('form_phone')}}</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="col-md-6">
                                    <label for="club">{{$meta->getMeta('form_club')}}</label>
                                    <select class="form-control" id="club" name="club">
                                        <option value="Club Niagara">Club Niagara</option>
                                        <option value="Club Fitness">Club Fitness</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="check" id="accord" value="checked" required>
                                    <label for="accord">{{$meta->getMeta('form_accept')}}</label>
                                </div>
                                <input type="hidden" name="form" value="Club Tour">
                                {{csrf_field()}}
                                <div class="col-md-12">
                                    <input class="send-form" type="submit" value="{{$meta->getMeta('form_submit')}}">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="for_modal_block">
                            <p>Хотите увидеть, как мир Niagara устроен изнутри? Какие тренажеры стоят в выбранном вами
                                клубе и как проходят занятия?
                                <br>
                                <br>Воспользуйтесь бесплатной услугой «Клубный тур», и вас ждет познавательная экскурсия
                                по выбранному вами фитнес-клубу.
                                <br>
                                <br>Почувствуйте атмосферу Niagara!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  end Modal -->
<!-- Modal 2 -->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm modal_write">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{$meta->getMeta('form_contact_title')}}</h4>
            <div class="modal_write_border"></div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="name">{{$meta->getMeta('form_name')}}</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="phone">{{$meta->getMeta('form_phone')}}</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <input type="hidden" name="form" value="Call Us">
                    <div class="form-group">
                        <label for="textarea">{{$meta->getMeta('form_message')}}</label>
                        <textarea class="form-control" id="textarea" rows="3" name="message"></textarea>
                    </div>
                    {{csrf_field()}}
                    <input class="send-form" type="submit" value="{{$meta->getMeta('form_submit')}}">
                </form>
            </div>
        </div>
    </div>
</div>

