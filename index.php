<?php include_once './admin/header.php'; ?>

<?php

if(!isset($_GET['id']) && !isset($_GET['pid']) && !isset($_GET['bid'])){
    $_GET['id'] = 0;
}

?>

<!DOCTYPE html>
<html>
<head>

<title>A Portfolio - By Mathew Kleppin</title>

<link href="./css/index.css" rel="stylesheet" type="text/css" />
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


</head>
<body>

<div id="contact-me">
    <h3>Mathew Kleppin</h3>
    <h5>Designer, Developer, Web Guru</h5>
    <div class="bot-me">
        <b>Skype:</b> HellsAn631<br/>
        <b>Email:</b> mathew.kleppin@gmail.com
    </div>
    <div id="close-contact" class="close">
        <i class="fa fa-times"></i>
    </div>
</div>

<?php if(isset($_GET['id']) && $_GET['id'] == "0"){ ?>

<?php }else if((isset($_GET['pid']) && $_GET['pid'] == "0") || (isset($_GET['bid']) && $_GET['bid'] == "0")){ ?>

    <nav id="main-nav">



    </nav>

<?php } ?>

<?php if(isset($_GET['id']) && $_GET['id'] == "0"){ ?>
    <menu id="third-nav">

        <h1 class="namesake">
            Mathew Kleppin<br/>
            <small>Designer, Developer, Web Guru</small>
        </h1>

        <ul>
            <li id="portfolio"><h5>Portfolio</h5></li>
            <li class="disabled"><h5>Blog</h5></li>
            <li class="disabled"><h5>The Lab</h5></li>
            <li id="contact-mi"><h5>Contact</h5></li>
        </ul>

    </menu>
<?php }else{ ?>

    <menu id="second-nav">

        <ul>
            <li <?php if(isset($_GET['pid'])) echo 'class="active"'; ?> id="portfolio"><h5>Portfolio</h5></li>
            <li class="disabled"><h5>Blog</h5></li>
            <li class="disabled"><h5>The Lab</h5></li>
            <li id="contact-mi"><h5>Contact</h5></li>
        </ul>

    </menu>

<?php } ?>




<?php if(isset($_GET['id']) && $_GET['id'] == "0"){ ?>

    <div id="welcome">

    </div>

<?php }else{ ?>


<?php } ?>

<?php if(isset($_GET['pid']) || isset($_GET['bid'])): ?>

    <div id="content">

    </div>

<?php endif; ?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script defer src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script defer src="./js/jquery-ui-scrollable.js"></script>
<script defer src="./js/jquery.viewport.js"></script>
<script>
    var $pageGET = '?<?php echo (isset($_GET['pid']) ? 'pid='.$_GET['pid'] : (isset($_GET['bid']) ? 'bid='.$_GET['bid'] : 'id=0')); ?>';
    var $menuID = '<?php echo (isset($_GET['pid']) ? $_GET['pid'] : (isset($_GET['bid']) ? $_GET['bid'] : 0)); ?>';
    var $welcomeDisabled = <?php echo (isset($_GET['pid']) ? 'true' : (isset($_GET['bid']) ? 'true' : 'false')); ?>;
    var $pageLoaded = false;
</script>
<script src="./js/index.js"></script>

<?php if(isset($_GET['id']) && $_GET['id'] == "0"){ ?>

    <script>

        var imageArray = [];

        imageArray.push('./images/mountain2.jpg');

        loadPageImages(imageArray);

    </script>

<?php } ?>



</body>
</html>