<?php  

require "../includes/app.php";

use Model\Activity;

$folder= Activity::findFolderId($_POST["id"]);

echo $folder;
?>