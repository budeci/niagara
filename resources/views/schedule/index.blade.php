@extends('layout')
@section('content')
    <section class="schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs-schedule" role="tablist">
                        <li role="presentation" class="active pull-left"><a href="#adult" aria-controls="adult" role="tab" data-toggle="tab">{{$meta->getMeta('orar_maturi')}}</a></li>
                        <li role="presentation" class="pull-right"><a href="#kids" aria-controls="kids" role="tab" data-toggle="tab">{{$meta->getMeta('orar_kids')}}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="adult">
                            @foreach($days as $day)
                                <ul class="schedule-col">
                                    <li>
                                        <h3>{{$day->name}}</h3>
                                        <ul class="schedule-cell">
                                            @foreach($day->scheduleAdult as $orar)
                                                <li class="schedule-event">
                                                    <div class="orar-top">
                                                        <a href="{{route('get_schedule',['slug'=>$orar->id])}}" class="target-modal-schedule">
                                                            <span class="data-detetime">{{$orar->present()->renderHour()}}</span>
                                                        </a>
                                                        <label class="label-checkbox-event"><input class="checkbox-event" type="checkbox" name="event[]" value="{{$orar->id}}"></label>
                                                    </div>
                                                    <div class="orar-body">
                                                        <a href="{{route('get_schedule',['slug'=>$orar->id])}}" class="target-modal-schedule">    
                                                            <p class="orar-body-title schedule-event__title"><strong>{{$orar->name}}</strong></p>
                                                            <span>{{$orar->hall}}</span>
                                                        </a>
                                                        <ul class="color-skill">
                                                            @foreach($orar->getProgram as $item)
                                                                <li title="{{$item->name}}" style="background-color: {{$item->color}}"></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <input type="hidden" value="Strada Ghidighici 5, Chișinău, Молдова" class="schedule-event__place">
                                                    <input type="hidden" value="{{$orar->present()->renderDescriptionEvent()}}" class="schedule-event__desc">
                                                    <input type="hidden" value="{{$day->weekdaysShort}}" class="schedule-event__weekdaysShort">
                                                    <input type="hidden" value="{{$day->weekdays}}" class="schedule-event__weekdays">
                                                    <input type="hidden" value="{{date('Y-m-d', strtotime("next $day->weekdays", strtotime(date('Y-m-d'))))}}" class="schedule-event__nextWeekdays">
                                                    <input type="hidden" value="60" class="schedule-event__timeDurations">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            @endforeach 
                        </div>
                        <div role="tabpanel" class="tab-pane" id="kids">
                            @foreach($days as $day)
                                <ul class="schedule-col">
                                    <li>
                                        <h3>{{$day->name}}</h3>
                                        <ul class="schedule-cell">
                                            @foreach($day->scheduleKids as $orar)
                                                <li class="schedule-event">
                                                    <div class="orar-top">
                                                        <a href="{{route('get_schedule',['slug'=>$orar->id])}}" class="target-modal-schedule">
                                                            <span class="data-detetime">{{$orar->present()->renderHour()}}</span>
                                                        </a>
                                                        <label class="label-checkbox-event"><input class="checkbox-event" type="checkbox" name="event[]" value="{{$orar->id}}"></label>
                                                    </div>
                                                    <div class="orar-body">
                                                        <a href="{{route('get_schedule',['slug'=>$orar->id])}}" class="target-modal-schedule">
                                                            <p class="orar-body-title schedule-event__title"><strong>{{$orar->name}}</strong></p>
                                                            <span>{{$orar->hall}}</span>
                                                        </a>
                                                        <ul class="color-skill">
                                                            @foreach($orar->getProgram as $item)
                                                                <li title="{{$item->name}}" style="background-color: {{$item->color}}"></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <input type="hidden" value="Strada Ghidighici 5, Chișinău, Молдова" class="schedule-event__place">
                                                    <input type="hidden" value="{{$orar->present()->renderDescriptionEvent()}}" class="schedule-event__desc">
                                                    <input type="hidden" value="{{$day->weekdaysShort}}" class="schedule-event__weekdaysShort">
                                                    <input type="hidden" value="{{$day->weekdays}}" class="schedule-event__weekdays">
                                                    <input type="hidden" value="{{date('Y-m-d', strtotime("next $day->weekdays", strtotime(date('Y-m-d'))))}}" class="schedule-event__nextWeekdays">
                                                    <input type="hidden" value="45" class="schedule-event__timeDurations">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            @endforeach 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" value="{{$meta->getMeta('antrenamente_adaugate')}}" class="label-antrenamente-adaugate">

    <!-- Modal -->
<!--     <div class="modal fade schedule-modal" id="schedule-modal" tabindex="-1" role="dialog" aria-labelledby="scheduleModal">
    <div class="modal-dialog schedule-dialog modal-lg" role="document">
        
    </div>
</div> -->

    <a href="#schedule_modal_window" data-effect="mfp-zoom-in" style="display:none" id="clicker_popup"></a>
    <div style="display:none; position:relative">
        <div class="page-loader_prFilter" id="schedule_program_popup_preloader" style="display: none;">
            <div class="loader">Loading...</div>
        </div>
        <div class="schedule-event-modal" id="schedule_modal_window">
        </div>
    </div>

    <div style="display:none;">
        <div class="schedule-event-modal" id="schedule_events_toGoogle">
            <div class="schedule-modal-content">
                <div class="modal-header"></div>
                <div class="modal-body">
                    <div class="schedule_events_toGoogle-title">{{$meta->getMeta('events_toGoogle_title')}}</div>
                    <div class="schedule_events_toGoogle-count">{{$meta->getMeta('events_toGoogle_count')}} <i>1</i></div>
                    <div class="schedule_events_toGoogle-box" style="">
                        <div class="schedule-export-modal-text"></div>
                    </div>
                    <a class="i-button i-button_red google_calendar_popup_btn" href="#" id="authorize-button" onclick="handleAuthClick(event)">{{$meta->getMeta('auth_google')}}</a>
                    <a class="i-button i-button_red google_calendar_popup_btn" href="#" id="google_add_multiply" style="display: none;">{{$meta->getMeta('add_atrenament_calendar')}}</a>
                </div>
                <div class="modal-footer"></div>        
            </div>
        </div>
    </div>
 
@endsection

@section('css')
    {!!Html::style('/assets/plugins/animate/animate.min.css')!!}
    {!!Html::style('/assets/plugins/magnific-popup/dist/magnific-popup.css')!!}
    {!!Html::style('/assets/plugins/icheck/skins/all.css')!!}
@endsection

@section('js')
     {!!Html::script('/assets/plugins/loading-overlay/src/loadingoverlay.min.js')!!}
     {!!Html::script('/assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js')!!}
     {!!Html::script('/assets/plugins/icheck/icheck.min.js')!!}
     {!!Html::script('/assets/plugins/moment/min/moment-with-locales.min.js')!!}
     {!!Html::script('/assets/plugins/google-calendar/googleCalendarController.js')!!}
     {!!Html::script('/assets/plugins/google-calendar/exportCalendarToICSController.js')!!}
     {!!Html::script('/assets/plugins/google-calendar/common_scripts.js')!!}
     {!!Html::script('https://apis.google.com/js/client.js?onload=checkAuth')!!}
    @include('home.partials.js')
    <script>
        $('input.checkbox-event').iCheck({
            checkboxClass: 'icheckbox_minimal-green',
            increaseArea: '20%' // optional
        }).on('ifChecked', function(e) {
            $(this).parents('li:first').addClass('is-active');
        }).on('ifUnchecked', function(e) {
            $(this).parents('li:first').removeClass('is-active');
        });
        window.page_type = 'schedule';
        window.time_zone = 'Europe/Chisinau';
        initModal('#clicker_popup', 'modal_event mfp-move-from-top', 'inline');
        var inProcess = false;
        $('.target-modal-schedule').click(function(event) {
            event.preventDefault();
            $.LoadingOverlay("show", {
                //color: "rgba(0, 0, 0, 0.5)",
                image: ''
            });
            if (!inProcess) {
                $(this).parents('li:first').find('input.checkbox-event').iCheck('check');
                $.ajax({
                    type: 'GET',
                    url: $(this).attr('href'),
                    beforeSend: function () {
                        inProcess = true;
                    },

                    success: function (response) {
                        if(response) {
                            $('#schedule_modal_window').html(response);
                            initModal('#google_export_one', 'schedule-event-modal mfp-move-from-top', 'inline');
                            //Добавление в календарь гугл из карточки мероприятия
                            //Очищаем ранее добавленные
                            $('.schedule-export-modal-text').html('');
                            window.GCDataSingle = false;
                            $('#google_add_multiply').show();
                            $('.schedule_events_toGoogle-box').hide();
                            $('.schedule_events_toGoogle-count  i').text('');
                            $('.schedule_events_toGoogle-count i').text($('li.schedule-event.is-active').length);
                            checkAuth();
                        }else{
                            $('#schedule_modal_window').html("<h3>Nothing</h3>");
                        }
                    }
                }).done(function( data ) {
                    inProcess = false;
                    $.LoadingOverlay("hide");
                    $("#clicker_popup").trigger("click");
                });
            }
        });
    </script>

@endsection