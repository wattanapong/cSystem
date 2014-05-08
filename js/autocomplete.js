function log(item) {
	id = item.id;
	$("#Course_valueTh").val(item.valueTh);
	$("#Course_valueTh").prop('disabled', true);
	$("#Course_valueEn").val(item.valueEn);
	$("#Course_valueEn").prop('disabled', true);
}