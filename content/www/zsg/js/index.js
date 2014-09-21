var curselect = "#one-c";
var curhead = "#one-h";
var clicks = 0;
var totalnews = 0;

$("#one-h").click(function() {
	if(clicks == 0){clicks++; curhead = this;}
	if(this != curhead){
		moveItem("#one-c", this);
	}else{
		//goto article id
	}
});

$("#infobox").click(function() {
	window.location = "http://www.stardrivegame.com/"
});


$("#two-h").click(function() {
	if(clicks == 0){clicks++;}
	if(this != curhead){
		moveItem("#two-c", this);
	}
});

$("#thr-h").click(function() {
	if(clicks == 0){clicks++;}
	if(this != curhead){
		moveItem("#thr-c", this);
	}
});

$("#fou-h").click(function() {
	if(clicks == 0){clicks++;}
	if(this != curhead){
		moveItem("#fou-c", this);
	}
});

$(document).ready(function(){

	$("#two-c").hide();
	$("#thr-c").hide();
	$("#fou-c").hide();

	$.ajax({ url: '_listeners/listn.index.populate.php',
		  type: 'post',
		  data: {},
		  success: function(data) {
			  $("#con-content").html(data);
		  }
	});
	$.ajax({ url: '_listeners/listn.index.php',
		  type: 'post',
		  dataType : 'json',
		  data: {},
		  success: function(data) {
			var total = data[0];
			totalnews = total;
			resizeNews(curselect);
			var count = 1;

			if(total < 1){
				count = 0;
				//should say "there is no news to display"
			}
			total = 1;
			while(count == 1){
				switch(total){
					case 1:
						$("#one-h").html(data[total]);
						total++;
			   			$("#one-c").html(data[total]);
			   			console.log(data[total]);
			   			total = 2;
			   			break;
					case 2:
						total++;
						$("#two-h").html(data[total]);
						total++;
			   			$("#two-c").html(data[total]);
			   			total = 3;
			   			break;
					case 3:
						total++;total++;
						$("#thr-h").html(data[total]);
						total++;
			   			$("#thr-c").html(data[total]);
			   			total = 4;
			   			break;
					case 4:
						total++;total++;total++;
						$("#fou-h").html(data[total]);
						total++;
			   			$("#fou-c").html(data[total]);
			   			count = 0;
			   			break;
					default:
						count = 0;
						break;
				}


				if(total > data[0]){
					count = 0;
				}
		  	}

			if(data[0] == 4){
				count = -1;
			}

			total = data[0];
			while(count == 0){
				switch(total){
					case 1:
						$("#two-h").hide();
			   			$("#thr-h").hide();
			   			$("#fou-h").hide();
			   			count = -1;
			   			break;
					case 2:
						$("#thr-h").hide();
			   			$("#fou-h").hide();
			   			count = -1;
			   			break;
					case 3:
						$("#fou-h").hide();
			   			count = -1;
			   			break;
					case 4:
			   			count = -1;
			   			break;
					default:
						$("#one-h").hide();
						$("#one-c").hide();
		   				$("#two-h").hide();
			   			$("#thr-h").hide();
			   			$("#fou-h").hide();
						count = -1;
						break;
				}
				if(total <= 0){
					count = -1;
				}
			}
			$("#one-h").find("img").attr("src", "./images/side-arrow.png");
		},
		error: function (request, status, error) {
            alert ("status "+status+" error "+error+"responseText "+request.responseText);
        }
	});
});

function moveItem(selection, head){
	var hideme = 300;
	var showme = 300;
	var effect = "blind";
	var hash = { direction: "vertical" };

	$(curselect).css("height", "");
	$(selection).show(effect, hash, showme);
	$(curselect).hide(effect, hash, hideme);
	$(head).find("img").attr("src", "./images/side-arrow.png");
	$(curhead).find("img").attr("src", "./images/down-arrow.png");
	curselect = selection;
	curhead = head;
}

function resizeNews(selection, prevSelection){

	var added = (4-totalnews)*31;
	var retotal = 142+added;

	$(selection).css("height",retotal);

}
