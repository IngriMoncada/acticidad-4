
<?php
include('../config/config.php');
include('paciente.php');

if (isset($_POST) && !empty($_POST)){
    /* SI EXISTE UN REGISTRO Y NO ESTA VACIO */
  
    $data= new ingreso(); /* LLAMO A MI LIBRO DE RECETAS */
  
    if ($_FILES['pdf']['name'] !== ''){
      $_POST['pdf'] = saveImage($_FILES);
    }
  
    $save = $data-> save($_POST); /* UTILICE LA RECETA SAVE */
    if($save){
      $mensaje= '<div class="alert alert-success" role="alert">Usuario creado correctamente </div> ';
    }else{
      $mensaje='<div class="alert alert-danger" role="alert">Error al crear el usuario </div> ';
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
      if (isset($mensaje)){
        echo $mensaje;
      }
?>
            <h2 class="tex-center nb-2">registrar sesión</h2>

        <form method="POST" enctype="multipart/form-data">

            <div class="row mb-2">
            <div class="col-md-6">
                    <input type="text" name="nombres" id="nombres" placeholder="nombres del paciente" class="form-control" />

            </div>
            <div class="col-md-6">
                <input type="text" name="apellidos" id="apellidos" placeholder="apellidos del paciente" class="form-control" />

            </div>

            
            <div class="col-md-6">
                    <input type="email" name="email" id="email" placeholder="email del paciente" class="form-control" />

            </div>
            <div class="col-md-6">
                <input type="text" name="celular" id="celular" placeholder="celular del paciente" class="form-control" />

            </div>

            
            <div class="col-md-6">
                    <textarea id="enfermedades" name="enfermedades" placeholder="enfermedades del paciente" class="form-control"></textarea>


            </div>
            <div class="col-md-6">
                <input type="text" name="duracionsecion" id="duracionsecion" placeholder="duracionsesion" class="form-control" />

            </div>

            
            <div class="col-md-6">
                    <input type="datetime-local" name="fecha" id="fecha"  class="form-control" />

            </div>
            <div class="col-md-6">
                <input type="file" name="pdf" id="pdf"  class="form-control" />

            </div>
</div>
<div class="col-12">
    <button  class="btn btn-primary">Registrar</button>
  </div>
        </form>

        </div>        
    </body>
</html>




