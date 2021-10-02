<?php 



use Model\Admin;

function auth($args){
    $admin = new Admin($args);
    $errores= $admin->validate();
    if(empty($errores)){
        $result= $admin->existeuser();
        if(!$result){
            $errores=Admin::getErrors();
        }else{
            $autenticacion= $admin->passwordCorrecto($result);
            if(!$autenticacion){
                $errores= Admin::getErrors();
            }else{
                $errores=null;
            }
        }
    }else{
        $errores=null;
    }

    return json_encode($errores);
    
}




?>
