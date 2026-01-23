<?php 
class Database{
        private $host = "localhost";
        private $dbName = "agrokultura";
        private $username = "root";
        private $password = "";
        
        public function __construct()
        {
            try{
                $conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "lidhja u be me sukses";
            }catch(PDOException $e){
                echo "Lidhja deshtoi: " . $e->getMessage();
            }
        }
        
    }
?>
