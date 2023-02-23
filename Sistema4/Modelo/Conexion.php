<?php

    class BasedeDatos{
        private $conexion;
        private $host = "localhost";
        private $db = "procemi";
        private $user = "root";
        private $pass = "";
        
        public function __construct(){
            try{
                $this->conexion = new PDO ("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (Exception $e){
                echo "Error de conexion: " . $e->getMessage();
            }
        }

        public function getBD(){
            $this->conexion instanceof PDO;
            return $this->conexion;
        }
        
    }

?>