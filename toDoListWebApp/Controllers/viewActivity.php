<?php  

use Model\Activity;

function viewActivity($args){
    if($args["id"]!=""){
        $activity= Activity::findId($args["id"]);
    }
    return $activity;
}


?>