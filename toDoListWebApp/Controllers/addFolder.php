<?php  



use Model\Folders;

function addFolder($args){
    if($args["name"]!=""){
        $folder= new Folders($args);
        $result=$folder->save();
    }
    return $result;
}

?>