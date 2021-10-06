<?php 

use Model\Admin;

function auth($args){
    $admin = new Admin($args);
    $errors= $admin->validate();
    if(empty($errors)){
        $result= $admin->existeuser();
        if(!$result){
            $errors=Admin::getErrors();
        }else{
            $autenticacion= $admin->passwordCorrecto($result);
            if(!$autenticacion){
                $errors= Admin::getErrors();
            }else{
                $errors=null;
            }
        }
    }else{
        $errors=null;
    }

    return $errors;
    
}




?>
