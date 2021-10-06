<?php
require "../includes/app.php";


if($_POST!=null){

    //Call the function to authenticate the user
    if($_POST["action"]=="Auth"){
        require_once "../Controllers/auth/login.php";
        $result= auth($_POST["user"]);
        echo (json_encode($result));
    }else if($_POST["action"]=="addFolder"){ //Call the function to add a folder
        require_once "../Controllers/addFolder.php";
        $result= addFolder($_POST["folder"]);
        echo (json_encode($result));
    }
    else if($_POST["action"]=="deleteFolder"){ //Call the function to delete a folder
        require_once "../Controllers/deleteFolder.php";
        $result= deleteFolder($_POST["folder"]);
        echo (json_encode($result));
    }
    else if($_POST["action"]=="viewFolder"){ //Call the function to view the list of items of a folder
        require_once "../Controllers/viewFolder.php";
        $result= viewFolder($_POST["folder"]);
        echo (json_encode($result));
    }
    else if($_POST["action"]=="addActivity"){//Call the function to add an to-do item
        require_once "../Controllers/addActivity.php";
        $result= addActivity($_POST["activity"]);
        echo (json_encode($result));
    }
    else if($_POST["action"]=="viewActivity"){ //Call the function to get the information about an to-do item
        require_once "../Controllers/viewActivity.php";
        $result= viewActivity($_POST["activity"]);
        echo (json_encode($result));
    }
    else if($_POST["action"]=="editActivity"){ //Call the function to edit an element of a to-do item
        require_once "../Controllers/editActivity.php";
        $result= editActivity($_POST["activity"]);
        echo (json_encode($result));
    }


}else if($_GET!=null){
    if($_GET["action"]=="viewFolders"){ //Call the function to get the list of registered folders
        require_once "../Controllers/folder.php";
        $result= viewFolders();
        echo (json_encode($result));
    }
}
?>

