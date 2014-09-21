$(document).ready(function(){
	$.ajax({ url: '_listeners/listn.games.php',
		  type: 'post',
		  data: {},
		  success: function(data) {
			  $("#gamescon").html(data);
		  }
	});
});