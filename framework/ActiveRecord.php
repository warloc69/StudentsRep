<?php
namespace framework;
abstract class  ActiveRecord
{
    protected $db;
    public abstract function getPrimaryIdName();
    public abstract function getTableName();
    private function getColumns($props, $forupdate= false) {
        $result = ' ';
        foreach ($props as $prop) {
            if ($prop->getValue($this) != NULL) {
                $result .=  ($forupdate ? $prop->getName().'=' : ''). ':'.$prop->getName() .', ';
            }
        }
        $result = substr($result, 0, strlen($result)-2);
        return $result;
    }
    public function fillProperty($data) {
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
            if (isset($data[$prop->getName()])) {
                $prop->setValue($this,$data[$prop->getName()]);
            }
        }
    }
    public function find($data) {
        if(empty($data[$this->getPrimaryIdName()])) return null;
        $reflect = new \ReflectionClass($this);
        $statement = $this->db->prepare("SELECT * FROM ".$this->getTableName()." where "
            .$this->getPrimaryIdName()."=:".$this->getPrimaryIdName());
        $statement->execute (array(':'.$this->getPrimaryIdName() => $data[$this->getPrimaryIdName()]));
        return $statement->fetchALL(\PDO::FETCH_CLASS, $reflect->getName(),array($this->db));
    }
    public  function remove($data) {
        if(empty($data[$this->getPrimaryIdName()])) return null;
        $sql = "delete from ".$this->getTableName()." where "
            .$this->getPrimaryIdName()."=:".$this->getPrimaryIdName();
        $statement = $this->db->prepare($sql);
        $statement->execute (array(':'.$this->getPrimaryIdName() => $data[$this->getPrimaryIdName()]));
    }
    public function getAllAsClass(){
        $st = $this->db->prepare("SELECT * FROM ".$this->getTableName());
        $st->execute();
        $reflect = new \ReflectionClass($this);
        return $st->fetchALL(\PDO::FETCH_CLASS, $reflect->getName(),array($this->db));
    }
    public function getAll(){
        $st = $this->db->prepare("SELECT * FROM ".$this->getTableName());
        $st->execute();
        return $st->fetchALL(\PDO::FETCH_ASSOC);
    }

    public function update($data) {
        if(empty($data[$this->getPrimaryIdName()])) return null;
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        $this->fillProperty($data);
        $sql = "UPDATE ".$this->getTableName()." SET ".$this->getColumns($props,true)." WHERE "
            .$this->getPrimaryIdName()."=:".$this->getPrimaryIdName();
        $statement = $this->db->prepare($sql);
        $arr = array();
        foreach ($props as $prop) {
            if ($prop->getValue($this) != NULL) {
                $arr[ ':'.$prop->getName()] = $data[$prop->getName()];
            }
        }
        $statement->execute($arr);
    }
    public function create($data) {
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        $this->fillProperty($data);
        $sql = "INSERT INTO ".$this->getTableName()."(".str_replace(':','' ,$this->getColumns($props)).")".
            "VALUES (".$this->getColumns($props).")";
        $statement = $this->db->prepare($sql);
        $arr = array();
        foreach ($props as $prop) {
            if ($prop->getValue($this) != NULL) {
                $arr[ ':'.$prop->getName()] = $data[$prop->getName()];
            }
        }
        $statement->execute($arr);
        $props[$this->getPrimaryIdName()] = $this->db->lastInsertId();
    }
    public function save() {
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        $data = array();
        foreach ($props as $prop) {
            if ($prop->getValue($this) != NULL) {
                $data[$prop->getName()] =  $prop->getValue($this);
            }
        }
        if(isset($data[$this->getPrimaryIdName()])) {
            $this->update($data);
        } else {
            $this->create($data);
        }
    }
}