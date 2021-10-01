<?php 


use Model\Folders;


function viewFolders(){
    $folders= Folders::all();
    return json_encode($folders); 
}


?>