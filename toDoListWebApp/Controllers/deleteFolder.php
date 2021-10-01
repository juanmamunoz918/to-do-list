<?php  



use Model\Folders;
use Model\Activity;

function deleteFolder($args){
    if($args["id"]!=""){
        $folder= Folders::findId($args["id"]);
        Activity::deleteActivities($args["id"]);
        $result=$folder->delete();
    }
    return $result;
}


?>