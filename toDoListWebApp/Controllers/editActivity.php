<?php  


use Model\Activity;

function editActivity($args){
    if($args["id"]!=""){
        $activity= Activity::findId($args["id"]);
        if(isset($args["status"])){
            $activity->status=$args["status"];
        }else{
            if(isset($args["name"])){
                $activity->name=$args["name"];
            }
        }
        $result=$activity->save();
    }
    return $result;
}

?>