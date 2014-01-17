<?php
	header("Content-Type: application/json");

	$timezone = 'Asia/Seoul';
	$timezone_list = DateTimeZone::listIdentifiers(DateTimeZone::ALL);

	if(isset($_GET['timezone'])) {
		$timezone = $timezone_list[$_GET['timezone']];
	}

	// timezone 처리
	date_default_timezone_set($timezone);

	if(isset($_GET['url'])) {
		$target_url = 'http://'.$_GET['url'];

		$before_time = time(); // 요청 전 시간

		$headers = get_headers($target_url, 1); // 타겟 URL의 헤더 정보를 array['name'] 형태로 가져옴

		$tick = time() - $before_time; // 요청 전/후 시간 오차
		$get_time = strtotime($headers['Date']) - $tick;

		$result['url'] = $target_url;
		$result['timezone'] = $timezone;
		$result['date'] = date('Y-m-d H:i:s', $get_time);
		$result['result'] = 'success';
	} else {
		$result['result'] = 'error(url)';
	}

	// json으로 변경
	echo json_encode($result);
?>
