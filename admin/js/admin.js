(function($) {

    $(document).on("focus blur", "input", function(event){
        if (event.type == "focusin") {
            if (this.value === this.defaultValue) {

                if(!$(this).hasClass('non')){
                    this.value = '';
                }

            }
        }else{
            if (this.value === '') {
                this.value = this.defaultValue;
            }
        }
    });

    $(document).resize(function(){
        popupResize();
    });

    $(document).on("mousedown", "[link]", function (e) {

        disabledEventPropagation(e);

        if( e.which == 2 ) {
            var productLink = $('<a href="'+$(this).attr('link')+'" />');

            productLink.attr("target", "_blank");
            window.open(productLink.attr("href"));

            return false;
        }else if( e.which == 1 ) {
            window.location.href = $(this).attr('link');
        }

    });

    $(document).on("mousedown", "[project-id]", function (e) {

        disabledEventPropagation(e);

        displayPopup($(this).attr('project-id'), "pop.project.php");

    });

    $(document).on("mousedown", "#newProject", function (e) {

        disabledEventPropagation(e);

        displayPopup(0, "pop.project.php");

    });

    $(document).on("mousedown", "[task-id]", function (e) {

        disabledEventPropagation(e);

        displayPopup($(this).attr('task-id'), "pop.task.php");

    });

    $(document).on("mousedown", "#newTask", function (e) {

        disabledEventPropagation(e);

        displayPopup(0, "pop.task.php");

    });

    $(document).on("mousedown", "[snapshot-id]", function (e) {

        disabledEventPropagation(e);

        displayPopup($(this).attr('snapshot-id'), "pop.snapshot.php");

    });

    $(document).on("mousedown", "#newSnapshot", function (e) {

        disabledEventPropagation(e);

        displayPopup(0, "pop.snapshot.php");

    });

    $(document).on("mousedown", "[preview-id]", function (e) {

        disabledEventPropagation(e);

        displayPopup($(this).attr('preview-id'), "pop.preview.php");

    });

    $(document).on("mousedown", "#newPreview", function (e) {

        disabledEventPropagation(e);

        displayPopup(0, "pop.preview.php");

    });


    $(document).on("mousedown", "#background", function (e) {

        disabledEventPropagation(e);

        popupClose();

    });

    $(document).on("mousedown", "#overlay", function (e) {

        disabledEventPropagation(e);

    });

    function disabledEventPropagation(event){

        if (event.stopPropagation){

            event.stopPropagation();

        }else if(window.event){

            window.event.cancelBubble = true;

        }

    }

    function displayPopup($projectID, $url){

        if(checkSet($projectID) !== true){
            $projectID = 0;
        }

        $("#loadedContent").load( $url+"?id="+$projectID );

        setTimeout(function(){

            var $body = 0;

            if($(window).outerHeight() >= $(document).outerHeight()){
                $body = $(window);
            }else{
                $body = $(document);
            }

            $('#background').css({'opacity': '1', 'min-height': $body.outerHeight()});

            popupResize();

        }, 200);

    }

    function popupClose(){

        var $popup = $('#background');

        $popup.css({'opacity': '0'});

        setTimeout(function(){
            $popup.remove();

            $popup = $();
        }, 1000);

    }

    function popupResize(){

        var $overlay =  $('#overlay');
        var $body = 0;

        if($(window).outerHeight() >= $(document).outerHeight()){
            $body = $(window);
        }else{
            $body = $(document);
        }

        var $width = ($body.outerWidth()/2) - ($overlay.outerWidth()/2);
        var $height = ($body.outerHeight()/2) - ($overlay.outerHeight()/2);

        if($height <= 0){
            $height = 0;
        }

        if($width <= 0){
            $width = 0;
        }

        $overlay.css({'top': $height, 'left' : $width});

    }

    function popupBGResize($time){

        var $bg = $("#background");
        var $height = $(document).outerHeight();

        setTimeout(function(){
            if($bg.size() > 0){
                popupBGResize($time);
            }
        }, $time);

        if($bg.css('height') != $height){

            popupResize();

            $bg.css({'height': $height});

        }
    }

    function checkSet($obj){

        if(typeof($obj) == 'undefined')
            return false;
        else if($obj == "")
            return false;
        else if($obj == " ")
            return false;
        else if($obj == null)
            return false;
        else if($obj == false)
            return false;


        return true;

    }

    function ajaxSubmit($data){

        return $.ajax({
            url: './admin-listener.php',
            type: 'post',
            cache: false,
            data: $data,
            async: false,
            success: function(data) {

                return data;

            }
        });

    }

})(jq19);