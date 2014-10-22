function loadCalendar(id, link, msg) {

	var data = $(id).serialize();

	$.ajax({
		type : 'POST',
		url : link,
		data : data,
		success : function(data) {
			alert(data);
		},
		error : function(data) { // if error occured
			alert(msg);
			alert(data);
		},

		dataType : 'html'
	});
}