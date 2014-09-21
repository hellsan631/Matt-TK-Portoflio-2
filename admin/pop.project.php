
<?php

include_once "./header.php";

$project_id = (int)$_GET['id'];

$project = new Project();
$project = $project->loadInstance($project_id);

?>


<div id="background" class="clear-fix">
    <div id="overlay" style="width:600px;">

        <?php

            if($project === false):

        ?>

        <form action="admin-listener.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="submitType" value="0" />
            <h5>Header Image:</h5><input name="image" type="file" />
            <br/><br/>
            <input type="text" id="date_range" name="date_range" value="Date Range" /><br/>
            <input type="text" id="title" name="title" value="Title" /><br/>
            <input type="text" id="role" name="role" value="Role" /><br/>
            <input type="text" id="client" name="client" value="Client" /><br/>
            <input type="text" id="link" name="link" value="Link" /><br/>
            <input type="text" id="tags" name="tags" value="Tags" /><br/>
            <input type="text" id="stub" name="stub" value="Stub" /><br/>
            <input class="button" type="submit" value="submit" />
        </form>

        <?php

            else:

        ?>

        <form action="admin-listener.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="submitType" value="1" />
            <input type="hidden" name="id" value="<?php echo $project->getValue('id');?>" />
            <input type="hidden" name="header_img" value="<?php echo $project->getValue('header_img');?>" />
            <input type="hidden" name="stub_change" value="<?php echo $project->getValue('stub');?>" />
            <h4>Header Image:</h4><input name="image" type="file" /><br/>
            <?php

                if($project->getValue('header_img') !== 0 || $project->getValue('header_img') !== false):



            ?>
            <h5><?php echo $project->getValue('header_img');?></h5>
            <img src="../<?php echo $project->getValue('header_img');?>" style="width:600px; max-height:500; height:auto;" />
            <?php endif; ?>
            <br/><br/>
            <input type="text" id="date_range" name="date_range" value="<?php if($project->getValue('date_range') != null){echo $project->getValue('date_range').'" class="non';}else echo 'Date Range'; ?>" /><br/>
            <input type="text" id="title" name="title" value="<?php if($project->getValue('title') != null){echo $project->getValue('title').'" class="non';}else echo "Title"; ?>" /><br/>
            <input type="text" id="role" name="role" value="<?php if($project->getValue('role') != null){echo $project->getValue('role').'" class="non';}else echo "Role"; ?>" /><br/>
            <input type="text" id="client" name="client" value="<?php if($project->getValue('client') != null){echo $project->getValue('client').'" class="non';}else echo "Client"; ?>" /><br/>
            <input type="text" id="link" name="link" value="<?php if($project->getValue('link') != null){echo $project->getValue('link').'" class="non';}else echo "Link"; ?>" /><br/>
            <input type="text" id="tags" name="tags" value="<?php if($project->getValue('tags') != null){echo $project->getValue('tags').'" class="non';}else echo "Tags"; ?>" /><br/>
            <input type="text" id="stub" name="stub" value="<?php if($project->getValue('stub') != null){echo $project->getValue('stub').'" class="non';}else echo "Stub"; ?>" /><br/>
            <input class="button" type="submit" value="submit" />
        </form>

        <?php

            endif;

        ?>
    </div>
</div>