
<?php

include_once "./header.php";

$preview_id = (int)$_GET['id'];

$preview = new preview;
$preview = $preview->loadInstance($preview_id);

$projects = new project;
$projects = $projects->getList();

?>


<div id="background" class="clear-fix">
    <div id="overlay" style="width:600px;">

        <?php

            if($preview === false):

        ?>

        <form action="admin-listener.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="submitType" value="6" />
            <h5>Image:</h5><input name="image" type="file" />
            <br/><br/>
            <select name="project_id" id="project_id">
                <option value="0" selected>Select A Project</option>
                <?php

                foreach($projects as $project){

                    echo "<option value='{$project->getValue('id')}'>{$project->getValue('title')}</option>";

                }

                ?>
            </select><br/>

            <input class="button" type="submit" value="submit" />
        </form>

        <?php

            else:

        ?>

        <form action="admin-listener.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="submitType" value="7" />
            <input type="hidden" name="id" value="<?php echo $preview->getValue('id');?>" />
            <input type="hidden" name="prev_project" value="<?php echo $preview->getValue('project_id');?>" />
            <input type="hidden" name="prev_image"  value="<?php echo $preview->getValue('image');?>" />
            <h4>Image:</h4><input name="preview_img" type="file" /><br/>
            <?php
                if($preview->getValue('image') !== 0 || $preview->getValue('image') !== false):
            ?>
                <h5><?php echo $preview->getValue('image');?></h5>
                <img src="../<?php echo $preview->getValue('image');?>" style="max-width:600px; max-height:300; height:auto;" />
            <?php
                endif;
            ?>
            <br/><br/>
            <select name="project_id" id="project_id">
                <option value="0">Select A Project</option>
                <?php

                foreach($projects as $project){

                    if($project->id == $preview->getValue('project_id')){
                        echo "<option value='{$project->getValue('id')}' selected>{$project->getValue('title')}</option>";
                    }else{
                        echo "<option value='{$project->getValue('id')}'>{$project->getValue('title')}</option>";
                    }

                }

                ?>
            </select><br/>

            <input class="button" type="submit" value="submit" />
        </form>



        <?php

            endif;

        ?>

    </div>
</div>