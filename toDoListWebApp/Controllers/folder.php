<?php 


use Model\Folders;


function viewFolders(){
    $folders= Folders::all();
    return $folders; 
}


?>