<?php

namespace Model;

class Admin extends ActiveRecord{
    protected static $table="users";
    protected static $columnsDB=["id","username","password"];

    public $id;
    public $username;
    public $password;

    public function __construct($args=[]){
        $this->id= $args["id"] ?? null;
        $this->username= $args["username"] ?? "";
        $this->password= $args["password"] ?? "";
    }

    public function validate(){
        if(!$this->username){
            self::$errors[]="El user es obligatorio";
        }
        if(!$this->password){
            self::$errors[]="El password es obligatorio";
        }
        return self::$errors;
    }

    public function existeuser(){
        $query= "SELECT * FROM " . self::$table . " WHERE username='" .$this->username . "' LIMIT 1;";
        $result= self::$db->query($query);
        if(!$result->num_rows){
            self::$errors[]="El user no existe";
            return null;
        }else{
            return $result;
        }
    }

    public function passwordCorrecto($result){
        $user= $result->fetch_object();
        $correcto= password_verify($this->password,$user->password);
        if(!$correcto){
            self::$errors[]="Password incorrecto";
        }
        return $correcto;
    }

   
    
}


?>
