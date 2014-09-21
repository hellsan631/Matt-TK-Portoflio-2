$(document).ready(function(){
	$.ajax({ url: '_listeners/listn.company.php',
		  type: 'post',
		  data: {submitType: '0'},
		  success: function(data) {
			  $("#aboutcon").html(data);
		  }
	});
	$.ajax({ url: '_listeners/listn.company.php',
		  type: 'post',
		  data: {submitType: '1'},
		  success: function(data) {
			  $("#contactcon").html(data);
		  }
	});
});