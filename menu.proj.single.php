<?php include_once './admin/header.php'; ?>


<?php

    if(!isset($_GET['last_id'])){
        exit;
    }

    $previews = new preview;
    $project = new project;
    $previews = $previews->loadNextInstance($_GET['last_id']);

    foreach($previews as $preview):

        $project = $project->loadInstance($preview->getValue('project_id'));

?>

    <li <?php echo "menu-id='{$preview->getValue('project_id')}' style='background-image: url({$preview->getValue('image')});'"; ?>>
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

    endforeach;

?>