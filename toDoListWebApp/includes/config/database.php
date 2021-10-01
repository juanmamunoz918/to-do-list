<?php

//Connect to Database
function conectDB(){
    $db=new mysqli("localhost","tdl","Tdl918","todolist");
    mysqli_set_charset($db, 'utf8');
    if (!$db){
        echo "Error";
        exit;

    }
    return $db;
}

