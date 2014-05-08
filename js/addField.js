function addField(id, link, msg,id2,link2) {

	var data = $(id).serialize();

	$.ajax({
		type : 'POST',
		url : link,
		data : data,
		success : function(data) {
			alert(data);
			 $(id2).load(link2);
		},
		error : function(data) { // if error occured
			alert(data);
			//alert(data);
		},

		dataType : 'html'
	});
}