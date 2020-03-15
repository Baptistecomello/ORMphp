<?php

    namespace App\Entity;    
    class ProductEntity implements OrmEntity{

        const TABLE_NAME="current_item_in_stock";
        const PRIMARY_KEY="id";
        private $id;
        public $name;
        public $prix;
        public $stock;

        function getPrimaryKey(){
            return self::PRIMARY_KEY;
        }

        function getName(){
            return $this->name;
        }

        function setName($name){
            $this->name = $name; 
        }

        function getId(){
            return $this->id;
        }

        function setId($id){
        $this->id = $id; 
        }

        function getPrix(){
            return $this->prix;
        }

        function setPrix($prix){
            $this->prix = $prix;
        }

        function getStock(){
            return $this->stock;
        }

        function setStock($stock){
            $this->stock = $stock;        
        }

        public function getTableName(){
           return self::TABLE_NAME;
        }
    }

?>