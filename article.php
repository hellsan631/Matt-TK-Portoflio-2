
<?php

    include_once "./admin/header.php";

    $project_id = 1;

    if(isset($_GET['pid'])){
        $project_id = $_GET['pid'];
    }

    $project = new project;
    $project = $project->loadInstance($project_id);

    $tasks = $project->getRelated('task');
    $snapshots = $project->getRelated('snapshot');
    $previews = $project->getRelated('preview');

    $preview = $previews[0];

?>
<nav id="main-nav">

    <ul id="loadedPreview" class="main-nav" style="padding-bottom:30px;">

        <li <?php echo "class='active' style='background-image: url({$preview->getValue('image')}); cursor:default; height:450px;'"; ?>>
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

    </ul>

</nav>

<article class="article">

    <section class="text">

        <?php

            $count = 0;

            foreach($tasks as $task){

                if($count%2 == 0){

                echo "
                    <section class='para clear-fix'>

                        <div class='para-con'>

                            <div class='para-text'>
                                <h3>{$task->getValue('title')}</h3>
                                {$task->getValue('des')}
                            </div>

                        </div>

                        <div class='task-image' style='background-image: url({$task->getValue('image')}); cursor:default;'></div>

                    </section>";

                }else{
                    echo "
                    <section class='para clear-fix' style='text-align: left;'>

                        <div class='task-image' style='background-image: url({$task->getValue('image')}); cursor:default;'></div>

                        <div class='para-con'>

                            <div class='para-text right-side'>
                                <h3>{$task->getValue('title')}</h3>
                                {$task->getValue('des')}
                            </div>

                        </div>

                    </section>";
                }

                $count++;

                if($count == 3){
                    ?>

                    <ul class="pictures">
                        <?php

                        foreach($snapshots as $snapshot){

                            echo "<li class='snap-image' style='background-image: url({$snapshot->getValue('preview_img')});' snap='{$snapshot->getValue('full_img')}' ></div>";

                        }

                        ?>

                    </ul>

        <?php
                }
            }

        if($count < 3){
            ?>

            <ul class="pictures">
                <?php

                foreach($snapshots as $snapshot){

                    echo "<li class='snap-image' style='background-image: url({$snapshot->getValue('preview_img')});' snap='{$snapshot->getValue('full_img')}' ></div>";

                }

                ?>

            </ul>

        <?php

        }

        ?>

    </section>


</article>

<script>

    if($loadCount > 1){
        $("#loadedPreview").css('display', 'none');
    }

    var imageArray = [];

    <?php

        foreach($snapshots as $snapshot){

            echo "imageArray.push('{$snapshot->getValue('preview_img')}');";

        }

        foreach($tasks as $task){

            echo "imageArray.push('{$task->getValue('image')}');";

        }

    ?>

    loadPageImages(imageArray);
</script>