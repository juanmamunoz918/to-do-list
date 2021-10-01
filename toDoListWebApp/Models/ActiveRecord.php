<?php

namespace Model;

class ActiveRecord{
    protected static $db;
    protected static $columnsDB=[];
    protected static $table="";
    protected static $errors=[];
    
    

    public function __construct($args=[]){

    }

    public static function setDB($database){
        self::$db = $database;
    }

    public function save(){
        if(!is_null($this->id)){
            $result= $this->update();
        }
        else{
           $result= $this->create();
        }
        return $result;
    }

    public function create(){
        $datos= $this->sanitize();

        $query="INSERT INTO ". static::$table."( ";
        $query.= join(", ",array_keys($datos));
        $query.= " ) VALUES ('";
        $query.= join("', '",array_values($datos));
        $query.="');";

        $result= self::$db->query($query);
        return $result;
    }

    public function update(){
        $datos= $this->sanitize();
        
        $valores=[];
        foreach($datos as $key => $value){
            $valores[]= "${key} = '${value}'";
        }
        $query= "UPDATE ". static::$table." SET ";
        $query.= join(", ", $valores);
        $query.= " WHERE id= '" . self::$db->escape_string($this->id) . "' ";
        $query.= " LIMIT 1;";
        $result= self::$db->query($query);

        return $result;

    }

    public function delete(){
        $query= "DELETE FROM ". static::$table." WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1;";
        $result= self::$db -> query($query);

        return $result;
    }

    public function attributes(){
        $attributes=[];
        foreach(static::$columnsDB as $column){
            if($column ==="id") continue;
            $attributes[$column]=$this->$column;
            
        } 
        return $attributes;
    }

    public function sanitize(){
        $attributes=$this->attributes();
        $sanitized=[];
        foreach($attributes as $key=> $value){
            $sanitized[$key]= self::$db->escape_string($value);
        }
        return $sanitized;
    }

    public static function getErrors(){
        return static::$errors;
    }

    

    

    public function validate(){
        static::$errors=[];
        return static::$errors;
    }

    public static function all(){

        $query= "SELECT * FROM ". static::$table;
        $result= self::consultSQL($query);

        return $result;

    }

    public static function get($limit){
        $query= "SELECT * FROM ". static::$table ." LIMIT ". $limit;
        $result= self::consultSQL($query);

        return $result;
    }

    public static function findId($id){
        $query= "SELECT * FROM ". static::$table." WHERE id= ${id}";
        $result= self::consultSQL($query);

        return array_shift($result);
    }

    

    public static function consultSQl($query){
        $result= self::$db->query($query);
        $array=[];
        while($register= $result->fetch_assoc()){
            $array[]= static::createObject($register);
        }

        $result->free();
        return $array;

    }

    protected static function createObject($register){
        $object= new static;

        foreach($register as $key => $value){
            if(property_exists($object, $key)){
                $object->$key = $value;
            }
        }

        return $object;
    }
    public function sincronizar($args=[]){
        foreach($args as $key=> $value){
            if(property_exists($this , $key) && !is_null($args[$key])){
                $this->$key = $value;
            }
        }
    }

    
}


?>