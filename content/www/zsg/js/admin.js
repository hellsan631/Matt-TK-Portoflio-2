var cursel = "#mi2-c";
var articleid = getArticleID();
var lastarticle = articleid;
var hidems = 100;
var showms = 300;

$(document).ready(function(){
	$("#mi3-c3").click(function(){
		//centering with css
		selectedPopup = "#popupAdv";
		centerPopup();
		//load popup
		loadPopupSize("860", "840");

		$("#eid").attr("value",articleid);
		loadedit(articleid);

	});
	//Click out event!
	$("#backgroundPopup").click(function(){
		disablePopup();
	});
	//Press Escape event!
	$(document).keypress(function(e){
		if(e.keyCode==27 && popupStatus==1){
			disablePopup();
		}
	});

	$("#mi1-c").hide();
	$("#mi2-c").hide();
	$("#mi3-c").hide();
	$("#mi4-c").hide();
	$("#mi5-c").hide();
	$("#mi6-c").hide();
	$("#mi8-c").hide();
	$(cursel).show();
	var responseme = auth(authme);
	if(responseme){
		$("#acon-login").hide();
	}else{
		$(cursel).hide();
	}

	$("#input").cleditor({width:600, height:200});
	$("#blurb").cleditor({width:600, height:200});
	$("#einput").cleditor({width:700, height:300});
	$("#eblurb").cleditor({width:700, height:300});
	$("#mi6-r").cleditor({width:600, height:400});
	$("#mi5-r").cleditor({width:600, height:400, controls: "source"});
	$("#mi4-r").cleditor({width:600, height:400});
	$("#mi4-r2").cleditor({width:600, height:400});
	clearCompose();

});

$("#mi1").click(function(){
	var responseme = auth(authme);
	if(responseme){
		$(cursel).hide(hidems);
		cursel = "#mi1-c";
		$(cursel).show(showms);
	}
});

$("#mi2").click(function(){
	var responseme = auth(authme);
	if(responseme){
		$(cursel).hide(hidems);
		cursel = "#mi2-c";
		$(cursel).show(showms);
	}
});

$("#mi3").click(function(){
	var responseme = auth(authme);
	if(responseme){
		$(cursel).hide(hidems);
		cursel = "#mi3-c";
		populatep(articleid);
		$(cursel).show(showms);
	}
});

$("#mi4").click(function(){
	var responseme = auth(authme);
	if(responseme){
		$(cursel).hide(hidems);
		cursel = "#mi4-c";
		loadCompanyPage();
		$(cursel).show(showms);
	}
});

$("#mi5").click(function(){
	var responseme = auth(authme);
	if(responseme){
		$(cursel).hide(hidems);
		cursel = "#mi5-c";
		loadGamesPage();
		$(cursel).show(showms);
	}
});

$("#mi6").click(function(){
	var responseme = auth(authme);
	if(responseme){
		$(cursel).hide(hidems);
		cursel = "#mi6-c";
		loadHomePage();
		$(cursel).show(showms);
	}
});

$("#mi8").click(function(){
	var responseme = auth(authme);
	if(responseme){
		$(cursel).hide(hidems);
		cursel = "#mi8-c";
		$(cursel).show(showms);
	}
});

$("#mi3-c1").click(function(){
	var responseme = auth(authme);
	if(responseme){
		if(articleid > 1){
			articleid = articleid-1;
			$("#mi3-r").hide(hidems);
			populatep(articleid);
			$("#mi3-r").show(showms);
		}else{
			articleid = 1;
			$("#mi3-r").hide(hidems);
			populaten(articleid);
			$("#mi3-r").show(showms);
		}
	}
});

$("#mi3-c2").click(function(){
	var responseme = auth(authme);
	if(responseme){
		lastarticle = getArticleID();
		if(articleid < lastarticle){
			articleid = articleid+1;
			$("#mi3-r").hide(hidems);
			populaten(articleid);
			$("#mi3-r").show(showms);
		}else{
			articleid = lastarticle;
			$("#mi3-r").hide(hidems);
			populatep(articleid);
			$("#mi3-r").show(showms);
		}
	}
});

$("#mi3-c4").click(function(){
	var responseme = auth(authme);
	if(responseme){
		var r=confirm("Confirm Deletion");
		if (r==true){
			deleteart(articleid);
			$("#mi3-r").hide(hidems);
			articleid--;
			populatep(articleid);
			$("#mi3-r").show(showms);
		}
	}
});


$("#mi7").click(function(){

	$.ajax({ url: '_listeners/listn.logout.php',
		  type: 'post',
		  data: {},
		  async: false,
		  cache: false,
		  success: function() {
			  authme = "false";
		  }
	});

	$(cursel).hide(200);
	cursel = "#acon-login";
	$(cursel).show(200);
});

$("#email").focus(function() {
	if (this.value === this.defaultValue) {
	    this.value = '';
	    $("#email").addClass("hovered");
	}
}).blur(function() {
	if (this.value === '') {
	    this.value = this.defaultValue;
	    $("#email").removeClass("hovered");
	}
});

$("#etitle").focus(function() {
	if (this.value === this.defaultValue) {
	    this.value = '';
	    $("#etitle").addClass("hovered");
	}
}).blur(function() {
	if (this.value === '') {
	    this.value = this.defaultValue;
	    $("#etitle").removeClass("hovered");
	}
});

$("#title").focus(function() {
	if (this.value === this.defaultValue) {
	    this.value = '';
	    $("#title").addClass("hovered");
	}
}).blur(function() {
	if (this.value === '') {
	    this.value = this.defaultValue;
	    $("#title").removeClass("hovered");
	}
});

$("#pass").focus(function() {
    if (this.value === this.defaultValue) {
        this.value = '';
			this.type = 'password';
			$("#pass").addClass("hovered");
    }
}).blur(function() {
    if (this.value === '') {
        this.value = this.defaultValue;
			this.type = 'text';
			$("#pass").removeClass("hovered");
    }
});

$("#mi2-b").click(function() {
	var titlev = $("#title").val();
	var blurbv = $("#blurb").val();
	var inputv = $("#input").val();


	var responseme = auth(authme);
	if(responseme){
		$.ajax({ url: '_listeners/listn.admin.php',
			  type: 'post',
			  cache: false,
			  data: {submitType: '0', title: titlev, blurb: blurbv, input: inputv},
			  success: function(data) {
				  if(!checkResponse(data)){
					  alert(data);
					  clearCompose();
				  }
			  }
		});
	}

});

$("#mi3-b").click(function() {
	var titlev = $("#etitle").val();
	var blurbv = $("#eblurb").val();
	var inputv = $("#einput").val();
	var vid = $("#eid").val();

	var responseme = auth(authme);
	if(responseme){
		$.ajax({ url: '_listeners/listn.admin.php',
			  type: 'post',
			  cache: false,
			  data: {submitType: '5', title: titlev, blurb: blurbv, input: inputv, article_id: vid},
			  success: function(data) {
				  if(!checkResponse(data)){
					  alert(data);
					  closePops();
					  $("#mi3-r").hide(hidems);
					  populate(articleid);
					  $("#mi3-r").show(showms);
				  }
			  }
		});
	}

});

$("#submit").click(function() {

	var email = $("#email").val();
	var pass = $("#pass").val();

	$.ajax({ url: '_listeners/listn.login.php',
		  type: 'post',
		  data: {aemail: email, apass: pass},
		  async: false,
		  cache: false,
		  success: function(data) {

			  var response = checkResponse(data);

			  if(response){
				  var length = 5;
				  var restest = data.substring(length,data.length);
				  var complete = restest
				  var responseme = auth(restest);
				  if(responseme){authme = complete;}
				  $("#acon-login").hide(200);
				  cursel = "#mi2-c";
				  $(cursel).show(200);
			  }else{
				  $("#resultlog").html(data);
			  }
		  }
	});
});

$("#mi5-b").click(function() {
	var homev = $("#mi5-r").val();

	var responseme = auth(authme);
	if(responseme){
		$.ajax({ url: '_listeners/listn.admin.php',
			  type: 'post',
			  cache: false,
			  data: {submitType: '9', value: homev},
			  success: function(data) {
				  alert(data);
				  loadGamesPage();
			  }
		});
	}

});

$("#mi4-b").click(function() {
	var companyv = $("#mi4-r").val();
	var contactv = $("#mi4-r2").val();

	var responseme = auth(authme);
	if(responseme){
		$.ajax({ url: '_listeners/listn.admin.php',
			  type: 'post',
			  cache: false,
			  data: {submitType: '10', company: companyv, contact: contactv},
			  success: function(data) {
				  alert(data);
				  loadCompanyPage();
			  }
		});
	}

});

$("#mi6-b").click(function() {
	var homev = $("#mi6-r").val();

	var responseme = auth(authme);
	if(responseme){
		$.ajax({ url: '_listeners/listn.admin.php',
			  type: 'post',
			  cache: false,
			  data: {submitType: '8', value: homev},
			  success: function(data) {
				  alert(data);
				  loadHomePage();
			  }
		});
	}

});

function populate(artid){
	$.ajax({ url: '_listeners/listn.admin.php',
		  type: 'post',
		  data: {submitType: '2', article_id: artid},
		  success: function(data) {
			  $("#mi3-r").html(data);
		  }
	});
}

function populatep(artid){
	$.ajax({ url: '_listeners/listn.admin.php',
		  type: 'post',
		  data: {submitType: '6', article_id: artid},
		  success: function(data) {
			  $("#mi3-r").html(data);
			  articleid = parseInt(data.substring(0,5));
		  }
	});
}

function populaten(artid){
	$.ajax({ url: '_listeners/listn.admin.php',
		  type: 'post',
		  data: {submitType: '7', article_id: artid},
		  success: function(data) {
			  $("#mi3-r").html(data);
			  articleid = parseInt(data.substring(0,5));
		  }
	});
}

function deleteart(artid){
	$.ajax({ url: '_listeners/listn.admin.php',
		  type: 'post',
		  data: {submitType: '3', article_id: artid},
		  success: function(data) {
			  alert(data);
		  }
	});
}

function loadHomePage(){
	$.ajax({ url: '_listeners/listn.index.populate.php',
		  type: 'post',
		  data: {},
		  success: function(data) {
			  $("#mi6-r").cleditor()[0].clear();
			  $("#mi6-r").val(data);
			  $("#mi6-r").cleditor()[0].refresh();
		  }
	});
}

function loadGamesPage(){
	$.ajax({ url: '_listeners/listn.games.php',
		  type: 'post',
		  data: {},
		  success: function(data) {
			  $("#mi5-r").cleditor()[0].clear();
			  $("#mi5-r").val(data);
			  $("#mi5-r").cleditor()[0].refresh();
		  }
	});
}

function loadCompanyPage(){
	$.ajax({ url: '_listeners/listn.company.php',
		  type: 'post',
		  data: {submitType: '0'},
		  success: function(data) {
			  $("#mi4-r").cleditor()[0].clear();
			  $("#mi4-r").val(data);
			  $("#mi4-r").cleditor()[0].refresh();
		  }
	});
	$.ajax({ url: '_listeners/listn.company.php',
		  type: 'post',
		  data: {submitType: '1'},
		  success: function(data) {
			  $("#mi4-r2").cleditor()[0].clear();
			  $("#mi4-r2").val(data);
			  $("#mi4-r2").cleditor()[0].refresh();
		  }
	});
}

function getArticleID(){

	var temp = null;

	$.ajax({ url: '_listeners/listn.admin.php',
		  type: 'post',
		  async: false,
		  cache: false,
		  data: {submitType: '1'},
		  success: function(data) {
			  temp = data;
		  }
	});

	return temp;
}

function loadedit(articleid){
	$.ajax({ url: '_listeners/listn.admin.php',
		  type: 'post',
		  data: {submitType: '4', article_id: articleid},
		  success: function(data) {
			  var jdata = $.parseJSON(data);
			  $("#einput").cleditor()[0].clear();
			  $("#eblurb").cleditor()[0].clear();
			  $("#etitle").val(jdata[0]);
			  $("#eblurb").val(jdata[1]);
			  $("#einput").val(jdata[2]);
			  $("#einput").cleditor()[0].refresh();
			  $("#eblurb").cleditor()[0].refresh();
		  }
	});
}

function checkResponse(response){

	var length = 5;
	var restest = response.substring(0,length);

	if(restest == "Auth:"){
		return true;
	}else if(restest == "Locat"){
		var location = response.substring(9,response.length);

		window.location = ''+location;
		return true;
	}

	return false;

}

function clearCompose(){
	$("#title").attr("value","title");
	$("#input").cleditor()[0].clear();
	$("#blurb").cleditor()[0].clear();
	$("#input").cleditor()[0].refresh();
	$("#blurb").cleditor()[0].refresh();
}

function auth(authstring){
	var check = false;

	$.ajax({ url: '_listeners/listn.auth.php',
		  type: 'post',
		  data: {authcode: authstring},
		  async: false,
		  cache: false,
		  success: function(data) {
			  var hehe = data.substring(0,4)

			  if(hehe == "true"){
				  check = true;
			  }
		  }
	});

	return check;
}

function closePops(){
	disablePopup();
}