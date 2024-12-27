<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/etc/config.php";

    class conexion {

        private $host;
        private $dbname;
        private $userdb;
        private $passworddb;
        private $charset;
        private static $pdo = null;

        public function __construct() {
            $this->host = DB_HOST;
            $this->dbname = DB_NAME;
            $this->userdb = DB_USER;
            $this->passworddb = DB_PASS;
            $this->charset = "utf8";

            if(self::$pdo == null ){
                $this->conectar();
            }
        }

        private function conectar(){
            $dns = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

            try{
                self::$pdo = new PDO($dns,$this->userdb,$this->passworddb);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            } catch(PDOException $e){
                die("Error al conectar: ".$e->getMessage());

            }
        }

        public static function obtenerConexion(){
            if(self::$pdo == null){
                new self;
            }
            
            return self::$pdo;
        }
    }
/*
try {
    $conexion = conexion::obtenerConexion();
    echo "Conexion exitosa";
}catch(PDOException $e){
    echo "Error al conectar: ".$e->getMessage();
}
*/
?>