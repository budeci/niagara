<div class="schedule-modal-content">
    <div class="modal-header">
        <ul class="orar-header">
            <li>
                <h3 class="modal-title" id="myModalLabel">{{$orar->present()->renderHour()}}</h3>
                <span>{{$orar->days->name}}</span>
            </li>
            <!-- <li>
                <h3 class="modal-hall">{{$orar->hall}}</h3>
            </li> -->
        </ul>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 col-md-6">
                <h4>{{$orar->name}}</h4>
                <span>{{$orar->hall}}</span>
                <ul class="color-skill">
                    @foreach($orar->getProgram as $item)
                        <li title="{{$item->name}}" style="background-color: {{$item->color}}"></li>
                    @endforeach
                </ul>
                {!!$orar->body!!}
            </div>
            <div class="col-md-6 col-md-6">
                <p>{{$meta->getMeta('add_to_calendar')}}</</p>
                <ul class="export-schedule">
                    <li><a class="add-to-calendar schedule-event-modal__add-calendar-item" id="google_export_one" href="#schedule_events_toGoogle"><img src="/assets/images/ico/clanedar-google.svg" alt="" width="20">Google</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="modal-footer"></div>
</div>