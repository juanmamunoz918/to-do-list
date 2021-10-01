<?php

namespace Model;

class Folders extends ActiveRecord{
    protected static $table="folders";
    protected static $columnsDB=["id","name"];

    public $id;
    public $name;
    

    public function __construct($args=[]){
        $this->id= $args["id"] ?? null;
        $this->name= $args["name"] ?? "";
    }

    public function delete(){
        $query= "DELETE FROM ". static::$table." WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1;";
        $result= self::$db -> query($query);

        
        return $result;
    }
}

?>

