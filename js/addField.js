function addField(id, link, msg,id2,link2) {

	var data = $(id).serialize();

	$.ajax({
		type : 'POST',
		url : link,
		data : data,
		success : function(data) {
			if( data != ""){
				var obj;
				try{
						obj =  eval(data);
						alert(obj[0].msg);
						if ($.isArray(id2)) {
							id2.forEach(function(_id2){ $(_id2).append($('<option>', { value : obj[0].id }).text(obj[0].value)); } );
						}else	$(id2).append($('<option>',{ value : obj[0].id }).text(obj[0].value));
				}catch(ex){
					alert(data);
					$(id2).load(link2);
				}
			}else alert(msg);
		},
		error : function(data) { // if error occured
			alert(msg);
			//alert(data);
		},

		dataType : 'html'
	});
}

function delField(id, link, msg,id2,link2) {

	var data = $(id).serialize();

	$.ajax({
		type : 'POST',
		url : link,
		data : data,
		success : function(data) {
			if( data != ""){
				var obj;
				try{
						obj =  JSON.parse(data);
						alert(obj.msg);
						if ($.isArray(id2)) {
							id2.forEach(function(_id2){ $(_id2+" option[value='"+obj[0].id+"']").remove(); } );
						}else	$(id2+" option[value='"+obj[0].id+"']").remove();
				}catch(ex){}
			}else alert(msg);
		},
		error : function(data) { // if error occured
			alert(msg);;
		},

		dataType : 'html'
	});
}