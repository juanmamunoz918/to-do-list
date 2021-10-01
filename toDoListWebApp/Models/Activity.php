<?php

namespace Model;

class Activity extends ActiveRecord{
    protected static $table="activities";
    protected static $columnsDB=["id","name","status","idFolder"];

    public $id;
    public $name;
    public $status;
    public $idFolder;

    public function __construct($args=[]){
        $this->id= $args["id"] ?? null;
        $this->name= $args["name"] ?? "";
        $this->status= $args["status"] ?? "";
        $this->idFolder= $args["idFolder"] ?? "";
    }
    public static function findFolderId($id){
        $query= "SELECT * FROM ". static::$table." WHERE idFolder= ${id}";
        $result= self::consultSQL($query);

        $folder=Folders::findId($id);
        return [$result,$folder];
    }
    public static function deleteActivities($folderId){
        $query= "DELETE FROM ". static::$table." WHERE idFolder=" . $folderId . ";";
        $result= self::$db -> query($query);

        return $result;
    }
}

?>

