// for datetime format to '1970-01-01 00:00:00'
Date.prototype.toDateTimeFormat = function() {
	var year = this.getFullYear().toString();
	var month = (this.getMonth() + 1).toString();
	var day = this.getDate().toString();
	var hour = this.getHours().toString();
	var minute = this.getMinutes().toString();
	var second = this.getSeconds().toString();

	return year + '-' + (month[1] ? month : '0'+month[0]) + '-'+ (day[1] ? day : '0'+day[0]) + ' ' + (hour[1] ? hour : '0'+hour[0]) + ':' + (minute[1] ? minute : '0'+minute[0]) + ':' + (second[1] ? second : '0'+second[0]);
}
