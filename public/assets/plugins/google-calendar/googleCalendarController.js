// Your Client ID can be retrieved from your project in the Google
// Developer Console, https://console.developers.google.com

$(document).ready(function() {

  initModal('#google_export', 'modal_event mfp-move-from-top', 'inline');

});

//Клик из общей таблицы занятий
$(document).on('click', '#google_export', function(event) {
  event.preventDefault();
  $('#google_add_multiply').show();
  $('.schedule_events_toGoogle-box').hide();
  checkAuth();
  if(window.page_type === 'schedule'){
    window.GCDataSingle = false;
    var selected_events = scheduleGetSelectedEvents();

    $('.schedule_events_toGoogle-count i').text('');
    $('.schedule_events_toGoogle-count i').text(selected_events.length);
  }

});


$(document).on('click', '#google_add_multiply', function(event) {
  event.preventDefault();
  
  if(window.page_type === 'schedule'){
    var selected_events = scheduleGetSelectedEvents();
  }
  if(window.page_type === 'event_detail'){
    var selected_events = eventDetailGetEventGoogle(); 
  }
  googleAddEvent(selected_events);
});


var CLIENT_ID = '114997071967-bh8fljepp5po4dhginmrgq0m6ee448jp.apps.googleusercontent.com';
var SCOPES = ["https://www.googleapis.com/auth/calendar"];

/**
 * Check if current user has authorized this application.
 */
function checkAuth() {
  gapi.auth.authorize(
    {
      'client_id': CLIENT_ID,
      'scope': SCOPES.join(' '),
      'immediate': true
    }, handleAuthResult);
}

/**
 * Handle response from authorization server.
 *
 * @param {Object} authResult Authorization result.
 */
function handleAuthResult(authResult) {
 
    var authorizeButton = document.getElementById('authorize-button');
        if (authResult && !authResult.error) {
          // Hide auth UI, then load client library.
          authorizeButton.style.display = 'none';
          $('#google_add_multiply').show();
          loadCalendarApi();
        } else {
          // Show auth UI, allowing the user to initiate authorization by
          // clicking authorize button.
          $('#google_add_multiply').hide();
        }
      }
      //$.colorbox.resize();

/**
 * Initiate auth flow in response to user clicking authorize button.
 *
 * @param {Event} event Button click event.
 */
function handleAuthClick(event) {
  gapi.auth.authorize(
    {client_id: CLIENT_ID, scope: SCOPES, immediate: false},
    handleAuthResult);
  return false;
}

/**
 * Load Google Calendar client library. List upcoming events
 * once client library is loaded.
 */
function loadCalendarApi() {
  gapi.client.load('calendar', 'v3', listUpcomingEvents);
}

/**
 * Print the summary and start datetime/date of the next ten events in
 * the authorized user's calendar. If no events are found an
 * appropriate message is printed.
 */
function listUpcomingEvents() {
}


function googleAddEvent(events_array){
  console.log(events_array);
  if(events_array){
    $('.schedule_events_toGoogle-box').show();
    var label = $('.label-antrenamente-adaugate').val();
    for (var i = 0; i < events_array.length; i++) {
        events_array[i];
        var request = gapi.client.calendar.events.insert({
          'calendarId': 'primary',
          'resource': events_array[i]
        });
        request.execute(function(event) {
            $('.schedule-export-modal-text').append('<a target="_blank" href="'+ event.htmlLink +'">'+label+' '+event.summary + '</a><br>'  );
        });
    };
    $('#google_add_multiply').hide();
    //$.colorbox.resize();
  }
}

function scheduleGetSelectedEvents(){

  //Очищаем ранее добавленные
  $('.schedule-export-modal-text').html('');

  var single = $('.schedule_events_toGoogle-count').attr('data-single');
  var events = [];
  //var current_club = $('#rd_gym_choose').val();
  if(window.GCDataSingle === false){   
    var $selected_events = $('li.schedule-event.is-active');
    moment.locale('ro');
    $selected_events.each(function(index, el) {
      var summary                 = $(el).find('.schedule-event__title strong').text();
      var location                = $(el).find('.schedule-event__place').val();
      var description             = $(el).find('.schedule-event__desc').val();
      var weekdaysShort           = $(el).find('.schedule-event__weekdaysShort').val();
      var weekdays                = $(el).find('.schedule-event__weekdays').val();
      var nextWeekdays            = $(el).find('.schedule-event__nextWeekdays').val();
      var timeDurations           = $(el).find('.schedule-event__timeDurations').val();
      var hour                    = $(el).find('.data-detetime').text();
      var now                     = moment(moment().format('YYYY-MM-DD[T]')+hour);
      if (moment().locale('en').format('dddd').toUpperCase() != weekdays.toUpperCase()) {
        now = moment(nextWeekdays+'T'+hour);
      }
      var start                   = now.format();
      var end                     = now.add(timeDurations, 'minutes').format();
      var nextyers                = now.add(1, 'years').format('YYYYMMDDThhmmss[Z]');
      events.push( {
          'summary': 'Niagara '+ summary,
          'location': location,
          'description': description,
          'start': {
            'dateTime': start,
            'timeZone': window.time_zone
          },
          'end': {
            'dateTime': end,
            'timeZone': window.time_zone
          },
          'recurrence': [
            'RRULE:FREQ=WEEKLY;BYDAY='+weekdaysShort+';INTERVAL=1;UNTIL='+nextyers+''
          ],
          'reminders': {
            'useDefault': true
          }
      }); 
    });
  }
  else if(window.GCDataSingle === true){
    var summary = $('.schedule-event-modal__title').text();
    var location = $('.schedule-event-modal__place').text();
    var description = $('#schedule-event-modal-desc').attr('data-desc');
    var time_arr = $('.schedule-event-modal__date').attr('data-datetime').split(' ');
    events.push( {

        'summary': 'Worldclass '+ current_club + ' ' + summary,
        'location': location,
        'description': description,
        'start': {
          'dateTime': time_arr[0] + 'T' + time_arr[1],
          'timeZone': window.time_zone
        },
        'end': {
          'dateTime': time_arr[0] + 'T' + time_arr[1],
          'timeZone': window.time_zone
        },
        'reminders': {
          'useDefault': true,
        }
    }); 
  }
  return events;
}

function eventDetailGetEventGoogle(){

  var events = [];
  var event_name = $('#event-title-name').text();
    //var summary = $('.schedule-event-modal__title').text();
    var location = $('.event-info__title-place').text();
    var description = $('#schedule-event-modal-desc').attr('data-desc');
    var time_arr = $('#event-start-date-full').val().split(';');
    var start_time = time_arr[0].split(' ');
    var end_time = time_arr[1].split(' ');
    events.push( {
        'summary': 'Worldclass '+ event_name,
        'location': location,
        'description': event_name,
        'start': {
          'dateTime': start_time[0] + 'T' + start_time[1],
          'timeZone': 'Europe/Moscow'
        },
        'end': {
          'dateTime': end_time[0] + 'T' + end_time[1],
          'timeZone': 'Europe/Moscow'
        },
        'reminders': {
          'useDefault': true,
        }
    }); 
    return events;
}