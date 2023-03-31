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
</head>
<body>
<?php include('../menu.php') ?>

<?php
    if (isset($error)){
      echo $error;
    }
    ?>
        <div class="container" >
            <?php
            if(isset($mensaje)){
                echo $mensaje;
            }
            ?>
            <h2 class="tex-center nb-2">modificar sesión</h2>

            <form method="POST" enctype="multipart/form-data">

<div class="row mb-2">
<div class="col-md-6">
        <input type="text" name="nombres" id="nombres" placeholder="nombres del paciente" class="form-control" value="<?= $data->nombres ?>"  />
        <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />

</div>
<div class="col-md-6">
    <input type="text" name="apellidos" id="apellidos" placeholder="apellidos del paciente" class="form-control" value="<?= $data->apellidos ?>" />

</div>


<div class="col-md-6">
        <input type="email" name="email" id="email" placeholder="email del paciente" class="form-control" value="<?= $data->email ?>" />

</div>
<div class="col-md-6">
    <input type="text" name="celular" id="celular" placeholder="celular del paciente" class="form-control" value="<?= $data->celular ?>"/>

</div>


<div class="col-md-6">
        <textarea id="enfermedades" name="enfermedades" placeholder="enfermedades del paciente" class="form-control"><?= $data->enfermedades ?></textarea>


</div>
<div class="col-md-6">
    <input type="text" name="duracionsecion" id="duracionsecion" placeholder="duracionsesion" class="form-control" value="<?= $data->duracionsecion ?>" />

</div>


<div class="col-md-6">
        <input type="datetime-local" name="fecha" id="fecha"  class="form-control" value="<?= $date->format('Y-m-d\TH:i') ?>" />

</div>
<div class="col-md-6">
    <input type="file" name="pdf" id="pdf"  class="form-control" />

</div>
</div>
<div class="col-12">
<button  class="btn btn-primary">Registrar</button>
</div>
</form>      
    </body>
</html>
