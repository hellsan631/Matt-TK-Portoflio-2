<?php

include_once "./header.php";

global $core;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$submitType = intval($_POST['submitType']);

    //new project
	if($submitType == 0){

        foreach($_POST as $key => $value){

            if($value == "Date Range")
                $_POST[$key] = 0;
            else if($value == "Role")
                $_POST[$key] = 0;
            else if($value == "Client")
                $_POST[$key] = 0;
            else if($value == "Title")
                $_POST[$key] = 0;
            else if($value == "Link")
                $_POST[$key] = 0;
            else if($value == "Tags")
                $_POST[$key] = 0;

            if($key == "stub"){

                if($value == "Stub" || $value == 0 || $value == false || $value == "stub"){
                   // $_SESSION['result'] = "Error: Stub is a required field";
                    //header("Location: ./admin.php");
                }

            }
        }

        if($_POST['link'] == "Yes" || $_POST['link'] == "yes" || $_POST['link'] == 1 || $_POST['link'] == "true"){
            $_POST['link'] = "/storage/".$_POST['stub']."/www/";
        }

        /*
         * id
         * date_range
         * role
         * client
         * title
         * link
         * tags
         * header_img
         * stub
        */

        $project = new project();

        $project->setValue('stub', $_POST['stub']);
        $project->setValue('date_range', $_POST['date_range']);
        $project->setValue('role', $_POST['role']);
        $project->setValue('client', $_POST['client']);
        $project->setValue('title', $_POST['title']);
        $project->setValue('link', $_POST['link']);
        $project->setValue('tags', $_POST['tags']);

        if(!empty($_FILES["image"]) && ($_FILES['image']['error'] == 0)){//File Upload Code

            $path = realpath("./");
            $path = str_replace("\\", "/", $path);
            $uploaddir = "/storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_FILES['image']['name']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);

            if (!file_exists('../'.$uploaddir)) {
                mkdir('../'.$uploaddir, 0777, true);
            }

            $file = "{$path}/../{$uploaddir}{$short}.{$ext}";

            if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
                $uploaded = ".{$uploaddir}{$short}.{$ext}";
            }

        }

        $project->setValue('header_img', $uploaded);

        if($project->saveNew()){
            $_SESSION['result'] = "Successfully Added New Project";
        }else if(!isset($_SESSION['result'])){
            $_SESSION['result'] = "Unable To Add New Project";
        }

        header("Location: ./admin.php");

	}
    //save project
    else if($submitType == 1){
        foreach($_POST as $key => $value){

            if($value == "Date Range")
                $_POST[$key] = 0;
            else if($value == "Role")
                $_POST[$key] = 0;
            else if($value == "Client")
                $_POST[$key] = 0;
            else if($value == "Title")
                $_POST[$key] = 0;
            else if($value == "Link")
                $_POST[$key] = 0;
            else if($value == "Tags")
                $_POST[$key] = 0;

            if($key === "stub"){

                if($value === "Stub" || $value === 0 || $value === false || $value === "stub"){
                    $_SESSION['result'] = "Error: Stub is a required field".$value;
                    header("Location: ./admin.php");
                }

            }

        }

        if($_POST['link'] == "Yes" || $_POST['link'] == "yes" || $_POST['link'] == 1 || $_POST['link'] == "true"){
            $_POST['link'] = "/storage/".$_POST['stub']."/www/";
        }

        $project = new project();

        $project->setValue('id', $_POST['id']);

        if($_POST['stub'] != $_POST['stub_change']){
            rename("../storage/".$_POST['stub_change'], "../storage/".$_POST['stub']);
        }

        $project->setValue('stub', $_POST['stub']);
        $project->setValue('date_range', $_POST['date_range']);
        $project->setValue('role', $_POST['role']);
        $project->setValue('client', $_POST['client']);
        $project->setValue('title', $_POST['title']);
        $project->setValue('link', $_POST['link']);
        $project->setValue('tags', $_POST['tags']);

        if(!empty($_FILES["image"]) && ($_FILES['image']['error'] == 0)){//File Upload Code

            $path = realpath("./");
            $path = str_replace("\\", "/", $path);
            $uploaddir = "/storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_FILES['image']['name']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);

            if (!file_exists('../'.$uploaddir)) {
                mkdir('../'.$uploaddir, 0777, true);
            }

            $file = "{$path}/../{$uploaddir}{$short}.{$ext}";

            if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
                $uploaded = ".{$uploaddir}{$short}.{$ext}";
            }else{
                $uploaded = $_POST['header_img'];
            }

        }else{
            $uploaded = $_POST['header_img'];
        }

        $project->setValue('header_img', $uploaded);

        if($project->saveOld()){
            $_SESSION['result'] = "Successfully Saved Existing Project";
        }else if(!isset($_SESSION['result'])){
            $_SESSION['result'] = "Unable To Saved Existing Project";
        }

        header("Location: ./admin.php");
    }
    //new task
    else if($submitType == 2){

        foreach($_POST as $key => $value){

            if($value == "Title")
                $_POST[$key] = 0;
            else if($value == "Description")
                $_POST[$key] = 0;


            if($key == "project_id"){

                if($value == 0 || $value == false || $value == null){
                    $_SESSION['result'] = "Error: Project ID is a required field";
                    header("Location: ./admin-task.php");
                }

            }
        }

        /*
        * id
        * project_id
        * image
        * title
        * description
       */

        $task = new task();

        $task->setValue('project_id', $_POST['project_id']);
        $task->setValue('title', $_POST['title']);
        $task->setValue('des', $_POST['des']);

        $project = new project();
        $project = $project->loadInstance($task->getValue('project_id'));

        if($project == false){
            $_SESSION['result'] = "Error: Unable to find project with corresponding ID";
            header("Location: ./admin-task.php");
        }

        if(!empty($_FILES["image"])  && ($_FILES['image']['error'] == 0)){//File Upload Code

            $path = realpath("./");
            $path = str_replace("\\", "/", $path);
            $uploaddir = "/storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_FILES['image']['name']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);

            $file = "{$path}/../{$uploaddir}{$short}.{$ext}";

            if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
                $uploaded = ".{$uploaddir}{$short}.{$ext}";
            }

        }

        $task->setValue('image', $uploaded);

        if($task->saveNew()){
            $_SESSION['result'] = "Successfully Added New Task";
        }else if(!isset($_SESSION['result'])){
            $_SESSION['result'] = "Unable To Add New Task";
        }

        header("Location: ./admin-task.php");

    }
    //save task
    else if($submitType == 3){
        foreach($_POST as $key => $value){

            if($value == "Title")
                $_POST[$key] = 0;
            else if($value == "Description")
                $_POST[$key] = 0;


            if($key == "project_id"){

                if($value == 0 || $value == false || $value == null){
                    $_SESSION['result'] = "Error: Project ID is a required field";
                    header("Location: ./admin-task.php");
                }

            }
        }

        /*
        * id
        * project_id
        * image
        * title
        * description
       */

        $task = new task();

        $task->setValue('id', $_POST['id']);
        $task->setValue('project_id', $_POST['project_id']);
        $task->setValue('title', $_POST['title']);
        $task->setValue('des', $_POST['des']);

        $project = new project();
        $project = $project->loadInstance($task->getValue('project_id'));

        if($project == false){
            $_SESSION['result'] = "Error: Unable to find project with corresponding ID";
            header("Location: ./admin-task.php");
        }

        if(!empty($_FILES["image"])  && ($_FILES['image']['error'] == 0)){//File Upload Code

            $path = realpath("./");
            $path = str_replace("\\", "/", $path);
            $uploaddir = "/storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_FILES['image']['name']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);

            $file = "{$path}/../{$uploaddir}{$short}.{$ext}";

            if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
                $uploaded = ".{$uploaddir}{$short}.{$ext}";
            }

            $task->setValue('image', $uploaded);

        }else{
            $task->setValue('image', $_POST['prev_img']);
        }

        if($_POST['project_id'] != $_POST['prev_project'] && (empty($_FILES["image"]) && ($_FILES['image']['error'] == 0))){

            $uploaddir = "./storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_POST['prev_img']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);
            $uploaded = ".{$uploaddir}{$short}.{$ext}";

            copy($_POST['prev_img'], $uploaded);

            $task->setValue('image', $uploaded);

        }

        if($task->saveOld()){
            $_SESSION['result'] = "Successfully Edited Existing Task";
        }else if(!isset($_SESSION['result'])){
            $_SESSION['result'] = "Unable To Edited Existing Task";
        }

        header("Location: ./admin-task.php");
    }
    //new snapshot
    else if($submitType == 4){

        foreach($_POST as $key => $value){

            if($key == "project_id"){

                if($value == 0 || $value == false || $value == null){
                    $_SESSION['result'] = "Error: Project ID is a required field";
                    header("Location: ./admin-snapshot.php");
                }

            }
        }

        /*
        * id
        * project_id
        * full_img
        * preview_img
       */

        $snapshot = new snapshot();

        $snapshot->setValue('project_id', $_POST['project_id']);

        $project = new project();
        $project = $project->loadInstance($snapshot->getValue('project_id'));

        if($project == false){
            $_SESSION['result'] = "Error: Unable to find project with corresponding ID";
            header("Location: ./admin-snapshot.php");
        }

        $uploaded = false;

        if(!empty($_FILES["preview_img"])  && ($_FILES['preview_img']['error'] == 0)){//File Upload Code

            $path = realpath("./");
            $path = str_replace("\\", "/", $path);
            $uploaddir = "/storage/".$project->getValue('stub')."/";
            $file = $uploaddir . basename($_FILES['preview_img']['name']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);

            $file = "{$path}/../{$uploaddir}{$short}.{$ext}";

            if (move_uploaded_file($_FILES['preview_img']['tmp_name'], $file)) {
                $uploaded = ".{$uploaddir}{$short}.{$ext}";
            }

        }

        $snapshot->setValue('preview_img', $uploaded);

        $uploaded = false;

        if(!empty($_FILES["full_img"])  && ($_FILES['full_img']['error'] == 0)){//File Upload Code

            $path = realpath("./");
            $path = str_replace("\\", "/", $path);
            $uploaddir = "/storage/".$project->getValue('stub')."/";
            $file = $uploaddir . basename($_FILES['full_img']['name']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);

            $file = "{$path}/../{$uploaddir}{$short}.{$ext}";

            if (move_uploaded_file($_FILES['full_img']['tmp_name'], $file)) {
                $uploaded = ".{$uploaddir}{$short}.{$ext}";
            }

        }

        $snapshot->setValue('full_img', $uploaded);

        if($snapshot->saveNew()){
            $_SESSION['result'] = "Successfully Added New Snapshot";
        }else if(!isset($_SESSION['result'])){
            $_SESSION['result'] = "Unable To Add New Snapshot";
        }

        header("Location: ./admin-snapshot.php");

    }
    //save snapshot
    else if($submitType == 5){
        foreach($_POST as $key => $value){

            if($key == "project_id"){

                if($value == 0 || $value == false || $value == null){
                    $_SESSION['result'] = "Error: Project ID is a required field";
                    header("Location: ./admin-snapshot.php");
                }

            }
        }

        /*
        * id
        * project_id
        * image
        * title
        * description
       */

        $snapshot = new snapshot();

        $snapshot->setValue('id', $_POST['id']);
        $snapshot->setValue('project_id', $_POST['project_id']);

        $project = new project();
        $project = $project->loadInstance($snapshot->getValue('project_id'));

        if($project == false){
            $_SESSION['result'] = "Error: Unable to find project with corresponding ID";
            header("Location: ./admin-snapshot.php");
        }

        if(!empty($_FILES["preview_img"])  && ($_FILES['preview_img']['error'] == 0)){//File Upload Code

            $path = realpath("./");
            $path = str_replace("\\", "/", $path);
            $uploaddir = "/storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_FILES['preview_img']['name']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);

            $file = "{$path}/../{$uploaddir}{$short}.{$ext}";

            if (move_uploaded_file($_FILES['preview_img']['tmp_name'], $file)) {
                $uploaded = ".{$uploaddir}{$short}.{$ext}";
            }

            $snapshot->setValue('preview_img', $uploaded);

        }else{
            $snapshot->setValue('preview_img', $_POST['prev_preview']);
        }

        if(!empty($_FILES["full_img"])  && ($_FILES['full_img']['error'] == 0)){//File Upload Code

            $path = realpath("./");
            $path = str_replace("\\", "/", $path);
            $uploaddir = "/storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_FILES['full_img']['name']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);

            $file = "{$path}/../{$uploaddir}{$short}.{$ext}";

            if (move_uploaded_file($_FILES['full_img']['tmp_name'], $file)) {
                $uploaded = ".{$uploaddir}{$short}.{$ext}";
            }

            $snapshot->setValue('full_img', $uploaded);

        }else{
            $snapshot->setValue('full_img', $_POST['prev_full']);
        }

        if($_POST['project_id'] != $_POST['prev_project']){

            $uploaddir = "./storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_POST['prev_preview']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);
            $uploaded = ".{$uploaddir}{$short}.{$ext}";

            copy($_POST['prev_preview'], $uploaded);

            $snapshot->setValue('preview_img', $uploaded);

            $uploaddir = "./storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_POST['prev_full']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);
            $uploaded = ".{$uploaddir}{$short}.{$ext}";

            copy($_POST['prev_full'], $uploaded);

            $snapshot->setValue('full_img', $uploaded);

        }

        if($snapshot->saveOld()){
            $_SESSION['result'] = "Successfully Edited Existing Snapshot";
        }else if(!isset($_SESSION['result'])){
            $_SESSION['result'] = "Unable To Edited Existing Snapshot";
        }

        header("Location: ./admin-snapshot.php");

    }
    //new preview
    else if($submitType == 6){

        foreach($_POST as $key => $value){

            if($key == "project_id"){

                if($value == 0 || $value == false || $value == null){
                    $_SESSION['result'] = "Error: Project ID is a required field";
                    header("Location: ./admin-preview.php");
                }

            }
        }

        /*
        * id
        * project_id
        * image
       */

        $preview = new preview;

        $preview->setValue('project_id', $_POST['project_id']);

        $project = new project();
        $project = $project->loadInstance($preview->getValue('project_id'));

        if($project == false){
            $_SESSION['result'] = "Error: Unable to find project with corresponding ID";
            header("Location: ./admin-preview.php");
        }

        $uploaded = false;

        if(!empty($_FILES["image"])  && ($_FILES['image']['error'] == 0)){//File Upload Code

            $path = realpath("./");
            $path = str_replace("\\", "/", $path);
            $uploaddir = "/storage/".$project->getValue('stub')."/";
            $file = $uploaddir . basename($_FILES['image']['name']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);

            $file = "{$path}/../{$uploaddir}{$short}.{$ext}";

            if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
                $uploaded = ".{$uploaddir}{$short}.{$ext}";
            }

        }

        $preview->setValue('image', $uploaded);
        $preview->setValue('title', $project->getValue('title'));

        if($preview->saveNew()){
            $_SESSION['result'] = "Successfully Added New Preview";
        }else if(!isset($_SESSION['result'])){
            $_SESSION['result'] = "Unable To Add New Preview";
        }

        header("Location: ./admin-preview.php");

    }
    //save preview
    else if($submitType == 7){
        foreach($_POST as $key => $value){

            if($key == "project_id"){

                if($value == 0 || $value == false || $value == null){
                    $_SESSION['result'] = "Error: Project ID is a required field";
                    header("Location: ./admin-preview.php");
                }

            }
        }

        /*
        * id
        * project_id
        * image
       */

        $preview = new preview;

        $preview->setValue('id', $_POST['id']);
        $preview->setValue('project_id', $_POST['project_id']);

        $project = new project();
        $project = $project->loadInstance($preview->getValue('project_id'));

        if($project == false){
            $_SESSION['result'] = "Error: Unable to find project with corresponding ID";
            header("Location: ./admin-preview.php");
        }

        if(!empty($_FILES["image"])  && ($_FILES['image']['error'] == 0)){//File Upload Code

            $path = realpath("./");
            $path = str_replace("\\", "/", $path);
            $uploaddir = "/storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_FILES['image']['name']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);

            $file = "{$path}/../{$uploaddir}{$short}.{$ext}";

            if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
                $uploaded = ".{$uploaddir}{$short}.{$ext}";
            }

            $preview->setValue('image', $uploaded);

        }else{
            $preview->setValue('image', $_POST['prev_image']);
        }


        if($_POST['project_id'] != $_POST['prev_project']){

            $uploaddir = "./storage/".$project->getValue('stub')."/";
            $uploaded = false;
            $file = $uploaddir . basename($_POST['image']);
            $ext = explode('.',$file);
            $ext = $ext[1];
            $short = md5($file.strtotime("now"));
            $short = substr($short, 0, 16);
            $uploaded = ".{$uploaddir}{$short}.{$ext}";

            copy($_POST['image'], $uploaded);

            $preview->setValue('image', $uploaded);

        }

        $preview->setValue('title', $project->getValue('title'));

        if($preview->saveOld()){
            $_SESSION['result'] = "Successfully Edited Existing Preview";
        }else if(!isset($_SESSION['result'])){
            $_SESSION['result'] = "Unable To Edited Existing Preview";
        }

        header("Location: ./admin-preview.php");

    }



}
