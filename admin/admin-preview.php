<?php

include_once "./header.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sidekick Admin</title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
	<link href="./css/admin.css" rel="stylesheet" type="text/css" />
	<link href="./css/redactor.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="./js/redactor.min.js"></script>
	<script>
		var jq19 = jQuery.noConflict(true);
	</script>
	<script src="./js/admin.js"></script>

<link rel="icon" type="image/ico" href="http://targetproof.net/images/favicon.ico">

</head>
<body>

	<?php
		global $si;

		$si = 4;

		include "menu.php";
	?>

    <div id="loadedContent"></div>

	<section id="content">

		<?php if(isset($_SESSION['result'])): ?>

			<div id="results">
				<h3>Result</h3>
				<h6><?php echo $_SESSION['result']; ?></h6>
			</div>

		<?php

			unset($_SESSION['result']);

		endif; ?>

		<div class="clear-fix row">
			<h2>Previews Directory</h2>
			<h6>The menu system's way of visual navigation</h6>

			<br/>

			<ul class="pages-list">
				<?php

                    $previews = new preview;

                    $previews = $previews->getList("project_id");

                    $projects = new project;
                    $projects = $projects->getList("id");

                    $temp = array();

                    foreach($projects as $key => $project){
                        $temp[$project->getValue('id')] = $project;
                        unset($projects[$key]);
                    }

                    $projects = $temp;
                    unset($temp);

                    foreach($previews as $preview){

                        echo "<li class='snap' preview-id=\"{$preview->getValue('id')}\">
                            <img style='display:block; margin-bottom: 5px; max-height:150px;' src='../{$preview->getValue('image')}' />
                            {$projects[$preview->getValue('project_id')]->getValue('stub')}
                        </li>";

                    }

                    echo "<li id='newPreview'>Create New Preview<i class='fa right fa-desktop'></i></li>";

				?>
			</ul>
		</div>


	</section>

</body>
</html>