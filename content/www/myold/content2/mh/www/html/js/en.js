$(document).ready(function() {
	var month = new Date();
	var year = new Date();
	month = month.getMonth();
	if(month<5){
		year = (year.getFullYear()-2012-1);
		month = month+5+(year*12);
	}else{
		year = (year.getFullYear()-2012);
		month = month-5+(year*12);
	}
	$('#timeline .text p.title').html('We are '+month+' months old');
	
});















