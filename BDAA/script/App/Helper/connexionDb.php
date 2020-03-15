<?php

    namespace App\Helper;

    class connexionDb{

        public $pdo;
        
        public function __construct(){
            $this->pdo = new \PDO('mysql:host=localhost;dbname=dbaa', 'root', '');
        }

        function getInstance(){
            if(is_null($this->pdo)){
                $this->pdo = new \PDO('mysql:host=localhost;dbname=dbaa', 'root', '');
            }
            return $this->pdo;
        }
    }

?>