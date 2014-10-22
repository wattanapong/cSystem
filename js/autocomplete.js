function log(item) {
	id = item.id;
	$("#Courseonsemester_course_id").val(item.id);
	$("#Course_valueTh").val(item.valueTh);
	$("#Course_valueTh").prop('readonly', true);
	$("#Course_valueEn").val(item.valueEn);
	$("#Course_valueEn").prop('readonly', true);
}