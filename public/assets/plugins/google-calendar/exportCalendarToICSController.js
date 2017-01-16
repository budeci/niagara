$(document).on('click', '#ics_file_export, #ics_file_export_one', function(event) {
	event.preventDefault();
	$('#fakeform').html('');

	if($(this)['context']['id'] === 'ics_file_export_one'){
		var selected_events = scheduleGetSelectedEventsICS(false);
	}

	else if($(this)['context']['id'] === 'ics_file_export'){
		if(window.page_type === 'schedule'){
		var selected_events = scheduleGetSelectedEvents();
		}
		if(window.page_type === 'event_detail'){
		var selected_events = eventDetailGetEvent(); 
		}
	}

	if(selected_events.length > 0){
		var input;
		for (var i = 0; i < selected_events.length; i++) {
		 	//console.log(selected_events[i]);
			for (var ev in selected_events[i]){
			    if (selected_events[i].hasOwnProperty(ev)) {
		 			$('#fakeform').append('<input name="'+ev+'['+i+']" type="hidden" value="'+selected_events[i][ev]+'">');
			    }
			}
		};
		$('#fakeform').attr('action', '/bitrix/php_interface/include/handlers/schedulePHPtoICS.php');
		$('#fakeform').submit();
	}
});

function scheduleGetSelectedEventsICS(multiple){
    	
    var current_club = $('#rd_gym_choose').val(); 
	var events = [];

    if(multiple){
	    var $selected_events = $('div.schedule-event.is-active'); 
		$selected_events.each(function(index, el) { 
		    var summary = $(el).find('.schedule-event__title').text();
		    var location = $(el).find('.schedule-event__place').text();
		    var description = $(el).attr('data-description');
		    var time_arr = $(el).attr('data-detetime').split(' ');
	    	
	    	events.push( {
	          'summary': 'Worldclass '+ current_club + ' ' + summary,
	          'location': location,
	          'description': description,
	          'start': time_arr[0] + 'T' + time_arr[1],
	          'end': time_arr[0] + 'T' + time_arr[1],
	          'reminders': {
	            'useDefault': true,
	          },
	          'url': window.location.href
	      	});
   		});
    }
    else{
    	var summary = $('.schedule-event-modal__title').text();
		var location = $('.schedule-event-modal__place').text();
		var description = $('#schedule-event-modal-desc').attr('data-desc');
		var time_arr = $('.schedule-event-modal__date').attr('data-datetime').split(' ');

		events.push( {
          'summary': 'Worldclass '+ current_club + ' ' + summary,
          'location': location,
          'description': description,
          'start': time_arr[0] + 'T' + time_arr[1],
          'end': time_arr[0] + 'T' + time_arr[1],
          'reminders': {
            'useDefault': true,
          },
          'url': window.location.href
      	});

    }


  return events;
}

function eventDetailGetEvent(){

  var events = [];
  var event_name = $('#event-title-name').text();
    //var summary = $('.schedule-event-modal__title').text();
    var location = $('#event-title-name').attr('data-target-text');
    var description = $('#event-title-name').attr('data-description');
    var time_arr = $('#event-start-date-full').val().split(';');
    var start_date = time_arr[1].split(' ');
    var end_date = time_arr[0].split(' ');
    console.log(time_arr);
    events.push( {
        'summary': 'Worldclass '+ event_name,
        'location': location,
        'description': description,
		'start': start_date[0] + 'T' + start_date[1],
		'end': end_date[0] + 'T' + end_date[1],
        'reminders': {
          'useDefault': true,
        }
    }); 
    return events;
}