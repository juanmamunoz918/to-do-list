<?php  



use Model\Activity;

function viewFolder($args){
    $folder= Activity::findFolderId($args["id"]);

    return json_encode($folder);
}

?>