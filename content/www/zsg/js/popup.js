//loading popup with jQuery magic!
var selectedPopup = 0;
var popupStatus = 0;

function loadPopup(){
	//loads popup only if it is disabled
	if(popupStatus==0){

		$("#backgroundPopup").css({
			"opacity": "0.7"
		});

		$("#backgroundPopup").fadeIn("slow");
		$(selectedPopup).fadeIn("slow");
		popupStatus = 1;
	}
}

//overrides the css sizes with the ones that are sent in
function loadPopupSize(w , h){
	//loads popup only if it is disabled
	if(popupStatus==0){

		$("#backgroundPopup").css({
			"opacity": "0.75"
		});

		$(selectedPopup).css({
			"width"  : w,
			"height" : h
		});

		$("#backgroundPopup").fadeIn("slow");
		$(selectedPopup).fadeIn("slow");
		popupStatus = 1;
	}
}
//disabling popup with jQuery magic!
function disablePopup(){
	//disables popup only if it is enabled
	if(popupStatus==1){

		$("#backgroundPopup").fadeOut("slow");
		$(selectedPopup).fadeOut("slow");

		popupStatus = 0;
		selectedPopup = 0;
	}
}

//centering popup
function centerPopup(){
	var $window = $(window);
	//request data for centering
	var windowWidth = $window.width();
	var windowHeight = $window.height();
	var popupHeight = $(selectedPopup).height();
	var popupWidth = $(selectedPopup).width();
	var topnum = windowHeight/2-popupHeight/1.5;
	var widthnum = windowWidth/2-popupWidth/2;
	if(topnum < 0){topnum = 0;}
	if(widthnum < 0){widthnum = 0;}
	//centering
	$(selectedPopup).css({
		"position": "absolute",
		"top": topnum,
		"left": widthnum
	});
	//only need force for IE6

	$("#backgroundPopup").css({
		"height": windowHeight
	});

}