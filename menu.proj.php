<?php include_once './admin/header.php'; ?>

<ul class="main-nav">

    <?php

    $previews = new preview;
    $project = new project;
    $previews = $previews->getList("date");
    $count = 0;

    foreach($previews as $preview):

        $project = $project->loadInstance($preview->getValue('project_id'));

    ?>

        <li <?php echo ($count < 2)? "class='active'" : "" ; echo "menu-id='{$preview->getValue('project_id')}' style='background-image: url({$preview->getValue('image')});'"; ?>>
            <h5><?php echo $project->getValue('title'); ?></h5>
            <div class="info">
                <h4>Client: <?php echo $project->getValue('client'); ?></h4>
                <h4>Role: <?php echo $project->getValue('role'); ?></h4>
                <h4 class="date_range">Date: <?php echo $project->getValue('date_range'); ?></h4>
                <p class="tags">
                    <?php echo $project->getValue('tags'); ?>
                    <a href="index.php?pid=<?php echo "{$preview->getValue('project_id')}"; ?>" class="right">View Project</a>
                </p>
            </div>
        </li>

    <?php

        $count++;

    endforeach;

    ?>

</ul>

<script>

    var imageArray = [];

    <?php

        foreach($previews as $preview){

            echo "imageArray.push('{$preview->getValue('image')}');";

        }


    ?>

    loadPageImages(imageArray);
</script>