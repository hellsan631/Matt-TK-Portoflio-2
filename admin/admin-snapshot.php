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

		$si = 3;

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
			<h2>Snapshots Directory</h2>
			<h6>Small pictures of a project that lead to large ones</h6>

			<br/>


			<ul class="pages-list">
				<?php

                    echo "<li id='newSnapshot'>Create New Snapshot<i class='fa right fa-desktop'></i></li>";

                    $snapshots = new snapshot;

                    $snapshots = $snapshots->getList("project_id");

                    $projects = new project;
                    $projects = $projects->getList("id");

                    $temp = array();

                    foreach($projects as $key => $project){
                        $temp[$project->getValue('id')] = $project;
                        unset($projects[$key]);
                    }

                    $projects = $temp;

                    foreach($snapshots as $snapshot){

                        echo "<li class='snap' snapshot-id=\"{$snapshot->getValue('id')}\">
                            <img style='display:block; margin-bottom: 5px; max-height:150px;' src='../{$snapshot->getValue('preview_img')}' />
                            {$projects[$snapshot->getValue('project_id')]->getValue('stub')}
                        </li>";

                    }

				?>
			</ul>
		</div>


	</section>

</body>
</html>