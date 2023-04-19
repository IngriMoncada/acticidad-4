<?php
include('../config/config.php');
include('paciente.php');
$p = new ingreso();
$data = mysqli_fetch_object($p->getOne($_GET['id']));
$date = new DateTime($data->fecha);

if (isset($_POST) && !empty($_POST)){
  $_POST['pdf'] = $data->pdf;
  if ($_FILES['pdf']['name'] !== ''){
    $_POST['pdf'] = saveImage($_FILES);
  }
  $update = $p->update($_POST);
  if ($update){
    $error = '<div class="alert alert-success" role="alert">Sesion modificado correctamente</div>';
  }else{
    $error = '<div class="alert alert-danger" role="alert" > Error al modificar un Sesion </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
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
<?php include('../menu.php') ?>

<?php
if (isset($error)){
    echo $error;
}
?>

<div class="container">
    <?php
    if(isset($mensaje)){
        echo $mensaje;
    }
    ?>
    <h2 class="text-center nb-2">Editar Información</h2>
    <br>
     <form method="POST" enctype="multipart/form-data">

        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <input type="text" name="nombres" id="nombres" placeholder="Nombres del Paciente" class="form-control" value="<?= $data->nombres ?>" />
                <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />

            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del Paciente" class="form-control" value="<?= $data->apellidos ?>" />

            </div>


            <div class="col-md-6 mb-3">
                <input type="email" name="email" id="email" placeholder="Email del Paciente" class="form-control" value="<?= $data->email ?>" />

            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="celular" id="celular" placeholder="Celular del Paciente" class="form-control" value="<?= $data->celular ?>" />

            </div>


            <div class="col-md-6 mb-3">
                <textarea id="enfermedades" name="enfermedades" placeholder="Enfermedades del Paciente" class="form-control"><?= $data->enfermedades ?></textarea>


            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="duracionsecion" id="duracionsecion" placeholder="Duración Sesión" class="form-control" value="<?= $data->duracionsecion ?>" />

            </div>


            <div class="col-md-6 mb-3">
                <input type="datetime-local" name="fecha" id="fecha" class="form-control" value="<?= $date->format('Y-m-d\TH:i') ?>" />

            </div>
            <div class="col-md-6 mb-3">
                <input type="file" name="pdf" id="pdf" class="form-control" />

            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary">Registrar</button>
        </div>
    </form>
</div>


<br>
        <br>

   <div class="container">     
      <section style="background-color: blue; color: #fff; text-align: center;">
          <a href="add.php?id=1" style="color: #fff; font-weight: bold; font-size: 2em; text-decoration: none;">Volver a Registro</a>
      </section>
    </div>
  <br>
  <br>

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
