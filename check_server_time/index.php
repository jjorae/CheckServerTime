<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<title>JJORAE.com - Check your server time!!</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
	</head>
	<body>
		<div class="container">
			<?php
				$timezone_list = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
			?>
			<div class="page-header">
				<h1>Check your server time!! <small>powerd by JJORAE.com</small></h1>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="timezone" class="col-xs-3 control-label">Timezone</label>
							<div class="col-xs-9">
								<select id="timezone" class="form-control">
									<?php
											foreach($timezone_list as $key=>$val) {
													if($val == 'Asia/Seoul') {
															$selected = 'selected';
													} else {
															$selected = '';
													}

													echo "<option value='$key' $selected>$val</option>";
											}
											unset($zone); // break the reference with the last element
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="url" class="col-xs-3 control-label">URL</label>
							<div class="col-xs-9">
								<div class="row">
									<div class="col-xs-1">
										<p class="form-control-static">http://</p>
									</div>
																<div class="col-xs-11">
										<input type="text" id="url" class="form-control" placeholder="Input target URL or IP address..">
																</div>
								</div>
							</div>
						</div>
						<div class="form-group">
								<div class="col-xs-12">
										<button type="button" id="get_time_button" class="btn btn-default btn-lg btn-block">Get time of target server!</button>
								</div>
						</div>
						<div class="form-group">
								<div id="time_div" class="col-xs-12"></div>
						</div>
					</form>
				</div>
			</div>

			<script src="https://code.jquery.com/jquery-latest.min.js"></script>
			<!-- Latest compiled and minified JavaScript -->
			<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
			<script src="js/date_helper.js"></script>
			<script src="js/time.js"></script>
		</div>
	</body>
</html>
