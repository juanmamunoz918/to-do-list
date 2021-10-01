<?php  

use Model\Activity;

function addActivity($args){
    if($args["name"]!=""){
        $activity= new Activity($args);
        $result=$activity->save();
    }
    return $result;
}

?>