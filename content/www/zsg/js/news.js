var storyoffset = 0;
var storycount = 4;
var displayed = 0;
var maxstory = getArticleCount();

$(document).ready(function(){
	loadBeginning(storycount);

	$("#loadmore").click(function() {
		maxstory = getArticleCount();
		if(displayed < maxstory){
			loadstory(storyoffset);
		}
	})
});

function loadBeginning(story){
	setTimeout(function () {
		loadstory(storyoffset);
		if (--story) loadBeginning(story);
	}, 400);
}

function loadstory(offsets){
	$.ajax({ url: '_listeners/listn.news.php',
		  type: 'post',
		  async: false,
		  cache: false,
		  data: {submitType: '0', offset: offsets},
		  success: function(data) {
			  var jdata = $.parseJSON(data);

			  var new_item = $("<div class=\"art_head\">"+jdata[0]+"</div><div class=\"art_body\">"+jdata[1]+"</div>").hide();
			  $("#storycon").append(new_item);
			  new_item.fadeIn(400);

			  displayed++;
			  storyoffset++;
		  }
	});
}

function getArticleCount(){
	var max = 0;

	$.ajax({ url: '_listeners/listn.news.php',
		  type: 'post',
		  data: {submitType: '3'},
		  async: false,
		  cache: false,
		  success: function(data) {
			  max = data;
		  }
	});

	return max;
}