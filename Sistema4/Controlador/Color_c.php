<?php

    include ("../Modelo/Color_m.php");
    if (isset($_POST["operacion"])){
        $operacion = $_POST["operacion"];
        switch($operacion){
            case "Registro":
                registrar_color();
            break;

            case "Editar":
                editar_color();
            break;
            
            case "Eliminar":
                eliminar_color();
            break;

            default:
                echo "No se puede procesar";
            break;

        }
    }

    if(isset($_GET["operacion"])){
        $consulta = $_GET["operacion"];
        switch ($consulta){
            case "ConsultarTodos":
                consultar_todos();
            break;
        } 
         

    }
    function registrar_color(){
        $a = new Color_m();
        $a->setDatos(null,$_POST["Nombre"]);
        $r = $a->Registrar();
        if ($r === 1){
            echo "Registrado";
        }else{
            echo "No registrado";
        }
    }

    function editar_color(){
        $a = new Color_m();
        $a->setDatos($_POST["ID"],$_POST["Nombre"]);
        $r = $a->Editar();
        if ($r === 1){
            echo "Registrado";
        }else{
            echo "No registrado";
        }
    }

    function eliminar_color(){
        $a = new Color_m();
        $a->setDatos($_POST["ID"],null);
        $r = $a->Eliminar();
        if ($r === 1){
            echo "Registrado";
        }else{
            echo "No registrado";
        }
    }

    function consultar_todos(){
        $a = new Color_m();
        $datos = $a->Consultar_Todos();
        echo json_encode(["data"=>$datos],false);
    }
?>