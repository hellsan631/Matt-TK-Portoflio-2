
<?php

include_once "./header.php";

$task_id = (int)$_GET['id'];

$task = new task();
$task = $task->loadInstance($task_id);

$projects = new project();
$projects = $projects->getList();

?>


<div id="background" class="clear-fix">
    <div id="overlay" style="width:600px;">

        <?php

            if($task === false):

        ?>

        <form action="admin-listener.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="submitType" value="2" />
            <h5>Header Image:</h5><input name="image" type="file" />
            <br/><br/>
            <select name="project_id" id="project_id">
                <option value="0" selected>Select A Project</option>
                <?php

                foreach($projects as $project){

                    echo "<option value='{$project->getValue('id')}'>{$project->getValue('title')}</option>";

                }

                ?>
            </select><br/>
            <input type="text" id="title" name="title" value="Title" /><br/>
            <textarea id="redactor_content" name="des">Description</textarea><br/>
            <input class="button" type="submit" value="submit" />
        </form>

        <?php

            else:

        ?>

        <form action="admin-listener.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="submitType" value="3" />
            <input type="hidden" name="id" value="<?php echo $task->getValue('id');?>" />
            <input type="hidden" name="prev_img" value="<?php echo $task->getValue('image');?>" />
            <input type="hidden" name="prev_project"  value="<?php echo $task->getValue('project_id');?>" />
            <h4>Image:</h4><input name="image" type="file" /><br/>
            <?php
                if($task->getValue('image') !== 0 || $task->getValue('image') !== false):
            ?>
                <h5><?php echo $task->getValue('image');?></h5>
                <img src="../<?php echo $task->getValue('image');?>" style="max-width:600px; max-height:300; height:auto;" />
            <?php
                endif;
            ?>
            <br/><br/>
            <select name="project_id" id="project_id">
                <option value="0">Select A Project</option>
                <?php

                foreach($projects as $project){

                    if($project->getValue('id') == $task->getValue('project_id')){
                        echo "<option value='{$project->getValue('id')}' selected>{$project->getValue('title')}</option>";
                    }else{
                        echo "<option value='{$project->getValue('id')}'>{$project->getValue('title')}</option>";
                    }

                }

                ?>
            </select><br/>
            <input type="text" id="title" name="title" value="<?php if($task->getValue('title') != null){echo $task->getValue('title').'" class="non';}else echo "Title"; ?>" /><br/>
            <textarea id="redactor_content" name="des"><?php if($task->getValue('des') != null){echo $task->getValue('des');}else echo "Description"; ?></textarea><br/>
            <input class="button" type="submit" value="submit" />
        </form>



        <?php

            endif;

        ?>

        <script>
            (function($) {
                $('#redactor_content').redactor();
            })(jq19);
        </script>
    </div>
</div>