<?php
	global $si;
?>

<section id="side-nav">
	<nav>
		<ul>
			<li link="admin.php" <?php if($si == 1){echo 'class="selected"';} ?>><i class="fa fa-files-o"></i> Projects</li>
            <li link="admin-task.php" <?php if($si == 2){echo 'class="selected"';} ?>><i class="fa fa-files-o"></i> - Tasks</li>
            <li link="admin-snapshot.php" <?php if($si == 3){echo 'class="selected"';} ?>><i class="fa fa-files-o"></i> - Snapshots</li>
            <li link="admin-preview.php" <?php if($si == 4){echo 'class="selected"';} ?>><i class="fa fa-files-o"></i> - Previews</li>
			<li link="admin-blog.php" <?php if($si == 5){echo 'class="selected"';} ?>><i class="fa fa-shield"></i> Blog</li>
		</ul>
	</nav>
</section>