jQuery(function($){
	var timer = null;
	var interval = 1000;
	var first_time = null;
	var get_url_data = null;
	var get_time_data = null;
	var befor_time = null;

	if($('#get_time_button').length) {
		$('#get_time_button').click(function(event) {
			event.preventDefault(); // click 이벤트 이외의 동작 막기

			if(timer != null) {
				clearInterval(timer);
				timer = null;
			}
		
			if($('#url').val().length < 1) {
				alert('Input target URL or IP address!');
				return;
			}

			first_time = $.now();
	
			$.getJSON( 'get_time.php', {
				timezone: $('#timezone').val(),
				url: $('#url').val()
			})
			.done(function(data) {
				if(data.result == 'success') {
					if(timer != null)
						return;
					get_url_data = data.url;
					get_time_data = new Date(data.date);

					get_time_data.setTime(get_time_data.getTime() + ($.now() - first_time)); // 시간 보정

					before_time = $.now();

					timer = setInterval(function() {
						get_time_data.setTime(get_time_data.getTime() + ($.now() - before_time));

						time_html = '<div class="alert alert-success">';
	                                        time_html += '<strong>Current time of ' + get_url_data + '</strong>';
        	                                time_html += '<h1>' + get_time_data.toDateTimeFormat() + '</h1>';	
						time_html += '</div>';

						//get_time_data.setTime(get_time_data.getTime() + 1000);

						$('#time_div').html(time_html);

						before_time = $.now();
					}, interval);
	
/*
					var time = new Date(data.date);
					time.setTime(time.getTime() + 1000);

					time_html = '<hr>';
					time_html += data.url + ' 사이트의 시간';
					time_html += '<h1>' + data.date + '</h1>';
					time_html += time.toDateTimeFormat();
*/
				} else {
					if(timer != null) {
						clearInterval(timer);
				                timer = null;
					}

					time_html = '<hr>';
					time_html += data.result;
				
					$('#time_div').html(time_html);
				}

				/*$.each( data, function(key, value) {
					time_html += key + ' : ' + value + '<br/>';
				});*/

			})
			.fail(function() {
				alert('Can not connect time server!');
			});
		});
	} else {
		clearInterval(timer);
		timer = null;
	}
});
