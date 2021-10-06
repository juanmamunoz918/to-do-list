<?php 


require "config/database.php";

require __DIR__ . "..\\..\\vendor/autoload.php";



use Model\ActiveRecord;


//Make the connection
$db = conectDB();

ActiveRecord::setDB($db);


?>