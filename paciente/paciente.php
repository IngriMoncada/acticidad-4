<?php 

include('../config/config.php');
include('../config/database.php');

class ingreso{

    public $conexion; /* LLAMO LA CONEXION DE MI BASE DE DATOS */

    function __construct(){
        $db= new Database(); /* LA CONEXION A LA BD SIEMPRE SE RENUEVE O ESTE EN LINEA */
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $nombres= $params['nombres'];
        $apellidos = $params["apellidos"];
        $email = $params["email"];
        $celular = $params["celular"];
        $enfermedades = $params["enfermedades"];
        $duracionsecion = $params["duracionsecion"];
        $fecha = $params["fecha"];
        $pdf = $params["pdf"];

        $insert ="INSERT INTO pacientes values (NULL,'$nombres', '$apellidos', '$email', '$celular', '$enfermedades', '$duracionsecion', '$fecha','$pdf') ";
        return mysqli_query($this->conexion, $insert); /* ENVIAR A LA BD TODO LO QUE ESTE DENTRO DE INSERT */

    }
    function getAll(){
        $basededatos= "SELECT * FROM pacientes"; /* Traigame todos los usuarios */
        return mysqli_query($this->conexion, $basededatos);
    }


function getOne($id)
{
    $sql = "SELECT * FROM pacientes WHERE id=$id";
    return mysqli_query($this->conexion, $sql);
}

function update($params){
    $nombres= $params['nombres'];
    $apellidos = $params["apellidos"];
    $email = $params["email"];
    $celular = $params["celular"];
    $enfermedades = $params["enfermedades"];
    $duracionsecion = $params["duracionsecion"];
    $fecha = $params["fecha"];
    $pdf = $params["pdf"];
    $id = $params["id"];

        $update = "UPDATE pacientes SET nombres= '$nombres', apellidos='$apellidos', email= '$email', celular= '$celular', enfermedades ='$enfermedades', duracionsecion= '$duracionsecion', fecha= '$fecha', pdf='$pdf' WHERE id = $id ";
        return mysqli_query($this->conexion, $update);
}

function delete($id){
    $delete = "DELETE FROM pacientes WHERE id = $id ";
    return mysqli_query($this->conexion, $delete);

} 

}


?>