<?php 



use Model\Admin;

function auth($args){
    $admin = new Admin($args);
    $errores= $admin->validate();
    if(empty($errores)){
        $result= $admin->existeuser();
        if(!$result){
            $errores=Admin::getErrores();
        }else{
            $autenticacion= $admin->passwordCorrecto($result);
            if(!$autenticacion){
                $errores= Admin::getErrores();
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