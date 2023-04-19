<?php
include('../config/config.php'); /* Conexion de la config */
include('paciente.php'); /* Conexion de las recetas */

$ingreso= new ingreso(); /* Llamo toda la clase que tienes mis recetas o funciones */
$todosRegistros= $ingreso->getAll(); /* Traigame la funcion ver todos los usuarios */

if(isset($_GET['id']) && !empty($_GET['id'])){
    $borrar= $ingreso->delete($_GET['id']);

    if($borrar){ /* SI SE BORRA */
        header('Location'. ROOT . 'paciente/index.php'); /* QUE SE ACTUALIZA LISTA */
    }else{ /* SINO SE BORRA QUE ME MUESTRE QUE HUBO UN ERROR */
        $mensaje= "<div class='alert-danger' rol='alert'>Error al eleminar el paciente</div>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style> 
  footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    font-size: 14px;
  }
  footer a {
    color: #fff;
    text-decoration: none;
  }
  footer a:hover {
    text-decoration: underline;
  }
</style>

<style>
  #derechos h3{
    background-color: #0611ad; /* Fondo azul oscuro */
    color: white; /* Texto en color blanco */
    font-size: 12px; /* Tamaño de letra más grande */
    text-align: center; /* Alineación de texto centrado */
    padding: 2px; /* Espaciado interno para separar el contenido del borde */
  }
</style>

</head>
<body>





    <?php include('../menu.php'); ?>

    <div class="container">
        <h3>Lista de Citas</h3>
        <br>
        
        <div class="row">
            <?php
            while ($usuarios= mysqli_fetch_object($todosRegistros)){
              
                echo "<div class='col-6'>";
                echo "<div class='border border-info p-2'>";
                echo "<h5>Nombre: $usuarios->Nombre $usuarios->Apellido  </h5>";
                echo "<p><b>Correo:</b> $usuarios->Email 
                <br>
                <b> Celular: </b>  $usuarios->Celular
                <br>";
                echo "<b>Servicio:</b> $usuarios->Consulta<br>"; 
                echo " <b>Fecha:</b> ".date("D", strtotime($usuarios->Fecha)) . " " . date("d-M-Y H:i", strtotime($usuarios->Fecha)). " </p> ";
                echo "";
                echo "<div class='center'> <a class='btn btn-success' href='". ROOT ."/paciente/edit.php?id=$usuarios->ID' >Modificar</a> - <a class='btn btn-danger' href='". ROOT ."/paciente/index.php?id=$usuarios->ID' >Eliminar</a> </div>";

                echo "</div>";
                echo "</div>";
            }

            ?>

        </div>
    </div>
    
    <br>
        <br>

   <div class="container">     
      <section style="background-color: blue; color: #fff; text-align: center;">
          <a href="index.php?id=1" style="color: #fff; font-weight: bold; font-size: 2em; text-decoration: none;">Actualizar Página luego de Eliminar</a>
      </section>
    </div>
  <br>
  <br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

<footer style="position: static; bottom: 0; left: 0; right: 0;">
<div class="container">
  <div class="container-fluid">
  
    <div class="row p-3 bg-dark text-white">
  
      <div class="col-xs-12 col-md-6 col-lg-3">
        <p class="h3" Columna>PsyRecruiters</p>
        <p class="text-secondary">Bogota,Colombia</p>
      </div>
      <div class="col-xs-12 col-md-6 col-lg-3">
        <p class="h5 mb-2">Nuestros Servicios</p>
        <div class="mb-2">
          <a class="text-secondary text-decoration-none" href="#">Capacitaciones</a>
        </div>
        <div class="mb-2">
          <a class="text-secondary text-decoration-none" href="#">Cursos</a>
        </div>
        <div class="mb-2">
          <a class="text-secondary text-decoration-none" href="#">Tips</a>
        </div>
      </div>
      <div class="col-xs-12 col-md-6 col-lg-3">
        <p class="h5 mb-2">Links</p>
        <div class="mb-2">
          <a class="text-secondary text-decoration-none" href="#">Terminos y condiciones</a>
        </div>
        <div class="mb-2">
          <a class="text-secondary text-decoration-none" href="#">Politica de privacidad</a>
        </div>
      </div>
      <div class="col-xs-12 col-md-6 col-lg-3">
        <p class="h5 mb-2">Contacto</p>
        <div class="mb-2">
          <a class="text-secondary text-decoration-none" href="#">Instagram</a>
        </div>
        <div class="mb-2">
          <a class="text-secondary text-decoration-none" href="#">Facebook</a>
        </div>
        <div class="mb-2">
          <a class="text-secondary text-decoration-none" href="#">Twitter</a>
  

      
  
      </div>
    </div>
  </div>
</div>
</div>
<br>

<div class="container">
  <section id="derechos">
    <div class="container">
      <h3>Copyright-All rights reserved PsyRecruiters ©2023</h3>
    </div>
  </section>
  </div>
  <br>



</footer>
</html>