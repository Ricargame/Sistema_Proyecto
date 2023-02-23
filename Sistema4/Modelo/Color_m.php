<?php 

    require("conexion.php");

    class Color_m extends BasedeDatos{
        private $id, $nombre, $conexion;

        public function __construct(){
            $this->conexion = new BasedeDatos();
            $this->conexion = $this->conexion->getBD();
        }

        public function setDatos($id,$nombre){
            $this->id = isset($id) ? $id : null;
            $this->nombre = isset($nombre) ? $nombre : null;
        }

        public function Registrar(){
            $sql = $this->conexion->prepare("INSERT INTO color(Color_nombre) VALUES (:nombre)");
            $sql->bindParam(":nombre",$this->nombre);
            if ($sql->execute()){
                return 1;
            }else{
                return 2;
            }
        }

        public function Editar(){
            $sql = $this->conexion->prepare("UPDATE color SET Color_nombre = ? WHERE Color_id = ?");
            $sql->bindParam(1,$this->nombre);
            $sql->bindParam(2,$this->id);
            if ($sql->execute()){
                return 1;
            }else{
                return 2;
            }

        }

        public function Eliminar(){
            $sql = $this->conexion->prepare("DELETE FROM Color WHERE Color_id = ?");
            $sql->bindParam(1,$this->id);
            if ($sql->execute()){
                return 1;
            }else{
                return 2;
            }

        }

        public function Consultar_Todos(){
            $sql = $this->conexion->prepare("SELECT * FROM color");
            if($sql->execute()){
                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            }else{
               $resultado = []; 
            }
            
           
            return $resultado;
        }
    }
?>