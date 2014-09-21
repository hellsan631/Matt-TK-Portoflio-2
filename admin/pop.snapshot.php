
<?php

include_once "./header.php";

$snapshot_id = (int)$_GET['id'];

$snapshot = new snapshot;
$snapshot = $snapshot->loadInstance($snapshot_id);

$projects = new project;
$projects = $projects->getList();

?>


<div id="background" class="clear-fix">
    <div id="overlay" style="width:600px;">

        <?php

            if($snapshot === false):

        ?>

        <form action="admin-listener.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="submitType" value="4" />
            <h5>Preview Image:</h5><input name="preview_img" type="file" />
            <br/><br/>
            <h5>Full Image:</h5><input name="full_img" type="file" />
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
            <input type="hidden" name="submitType" value="5" />
            <input type="hidden" name="id" value="<?php echo $snapshot->getValue('id');?>" />
            <input type="hidden" name="prev_project" value="<?php echo $snapshot->getValue('project_id');?>" />
            <input type="hidden" name="prev_preview" value="<?php echo $snapshot->getValue('preview_img');?>" />
            <input type="hidden" name="prev_full"  value="<?php echo $snapshot->getValue('full_img');?>" />
            <h4>Preview Image:</h4><input name="preview_img" type="file" /><br/>
            <?php
                if($snapshot->getValue('preview_img') !== 0 || $snapshot->getValue('preview_img') !== false):
            ?>
                <h5><?php echo $snapshot->getValue('preview_img');?></h5>
                <img src="../<?php echo $snapshot->getValue('preview_img');?>" style="max-width:600px; max-height:300; height:auto;" />
            <?php
                endif;
            ?>
            <br/><br/>
            <h4>Full Image:</h4><input name="full_img" type="file" /><br/>
            <?php
                if($snapshot->getValue('full_img') !== 0 || $snapshot->getValue('full_img') !== false):
            ?>
                <h5><?php echo $snapshot->getValue('full_img');?></h5>
                <img src="../<?php echo $snapshot->getValue('full_img');?>" style="max-width:600px; max-height:300; height:auto;" />
            <?php
                endif;
            ?>
            <br/><br/>
            <select name="project_id" id="project_id">
                <option value="0">Select A Project</option>
                <?php

                foreach($projects as $project){

                    if($project->id == $snapshot->getValue('project_id')){
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