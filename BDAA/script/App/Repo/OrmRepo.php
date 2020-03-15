<?php

    namespace App\Repo;

    use App\Entity\ProductEntity;
    use App\Helper\connexionDb;
    use ReflectionClass;

    abstract class OrmRepo
    {
        function nbInterrogation($array){
            $nbParam = count($array);
            for($i = 0; $i < $nbParam; $i++){
                $txt[$i] = "?";
            }
            $chainInterrogation = implode(',', $txt);

            return $chainInterrogation;
        }

        function getTableName(){
            $entity = static::ENTITY;
            $reflect = new ReflectionClass($entity);
            return $table = $reflect->getConstant("TABLE_NAME");
        }

        function getPrimaryKey(){
            $entity = static::ENTITY;
            $reflect = new ReflectionClass($entity);
            return $primaryKey = $reflect->getConstant("PRIMARY_KEY");
        }

        // Insertion/update
        function save(ProductEntity $pe){
            $db = new connexionDb();
            $pdo = $db->getInstance();
            try {
                $reflect = new ReflectionClass($pe);
            } catch (\ReflectionException $e) {
            }
            $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
            foreach($props as $prop){
                $array[$prop->getName()] = $prop->getValue($pe);
            }
            $key = array_keys($array);
            $strKey = implode(',',$key);
            $val = array_values($array);
            $keyUpdate = array_keys($array);
            $strKeyUpdate = implode('=?,',$key);
            $strKeyUpdate = $strKeyUpdate."=?";

            if(is_null($pe->getId())) {
                $insertDb = "INSERT INTO ". $this->getTableName() ."(".$strKey.") VALUES (".$this->nbInterrogation($array).")";
                $statement = $pdo->prepare($insertDb);
                $statement->execute($val);
                var_dump($insertDb);

            }
            else{
                $updateDb = "UPDATE ".$this->getTableName(). " SET ".$strKeyUpdate." WHERE ".$pe->getPrimaryKey()." = " .$pe->getId();
                var_dump($updateDb);
                $statement = $pdo->prepare($updateDb);
                $statement->execute($val);
                var_dump($updateDb);
            }
        }

        // Get an Entity object by id
        function getItemById(int $id){
            $db = new connexionDb();
            $pdo = $db->getInstance();
            $selectDbById = "SELECT * FROM ".$this->getTableName()." WHERE ".$this->getPrimaryKey()."=:id";
            $statement = $pdo->prepare($selectDbById);
            $statement->execute(array(
                "id"=>$id
            ));
            $statement = $statement->fetch(\PDO::FETCH_ASSOC);
            $keys = array_keys($statement);
            $entity = new ProductEntity();
            foreach($keys as $key){
                $setter = "set".ucfirst($key);
                $entity->{$setter}($statement[$key]);
            }
            var_dump($entity);
            return $entity;
        }

        // Get all items in a list of Entity
        function getAllItem(){

            $db = new connexionDb();
            $pdo = $db->getInstance();
            $entityTable = [];
            $selectAll = " SELECT * FROM ".$this->getTableName();
            $statement = $pdo->prepare($selectAll);
            $statement->execute();
            $entity = new ProductEntity();

            foreach($statement->fetchAll(\PDO::FETCH_ASSOC) AS $entity){
                $entityTable[] = $entity;
            }
            var_dump($entityTable);
            return $entityTable;
        }

        // Delete an item by id
        function deleteById(int $id){
            $db = new connexionDb();
            $pdo = $db->getInstance();
            $deleteById = "DELETE FROM ".$this->getTableName()." WHERE " .$this->getPrimaryKey()."=:id";
            $statement = $pdo->prepare(($deleteById));
            $statement->execute(array(
                "id"=>$id
            ));
        }

        // Delete an item by object
        function deleteByEntity(ProductEntity $pe){
            $db = new connexionDb();
            $pdo = $db->getInstance();
            $reflect = new ReflectionClass($pe);
            $deleteByObject = "DELETE FROM ".$this->getTableName()." WHERE ".$pe->getPrimaryKey()." = ".$pe->getId();
            var_dump($deleteByObject);
            $statement = $pdo->prepare(($deleteByObject));
            $statement->execute();
        }
    }

?>