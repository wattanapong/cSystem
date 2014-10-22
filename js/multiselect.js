function addSelect(idTo1,idFrom,idTo2){
	
	  $(idFrom+" option:selected").each(function() {
		  if (idTo2 != "")	 $id = $(idTo1+"_hide option[value="+$(this).val()+"]").length>0?$(idTo1):$(idTo2);
		  else $id = $(idTo1);

		  $id.append('<option value='+$(this).val()+'>'+$(this).text()+'</option>');
		  $(this).remove();
		  // add $(this).val() to your list
		  });
	  return false;

}

function multiselect(idTo1,idFrom,idTo2){
	
	 $(idFrom+" option").each(function() {	
		 
		 if (idTo2 != "")	 $id = $(idTo1+"_hide option[value="+$(this).val()+"]").length>0?$(idTo1):$(idTo2);
		  else $id = $(idTo1);
		 
		 $id.append('<option value='+$(this).val()+'>'+$(this).text()+'</option>');
		  $(this).remove();
		  });
	  return false;
}

function selectAll(id){
	$(id+" option").each(function() {	
		$(this).attr('selected','selected');
	});
	return false;
}