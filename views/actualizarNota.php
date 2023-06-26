<?php
require_once "../controllers/controllerGeneral.php";
    $obj=new controllerGeneral();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Menú Lateral</title>
  <style>
  
  body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;

}

.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 240px;
  height: 100vh;
  background-color: #333;
  color: #fff;
  overflow-y: auto;
  transition: all 0.3s ease-in-out;
}

.sidebar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  border-bottom: 1px solid #555;
}

.sidebar h2 {
  margin: 0;
  font-size: 1.5rem;
}


.menu {
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu li {
  margin-bottom: 10px;
}

.menu a {
  color: #fff;
  text-decoration: none;
  padding: 10px;
  display: block;
  transition: background-color 0.3s ease-in-out;
}

.menu a:hover {
  background-color: #555;
}

.content {
  margin-left: 240px;
  padding: 20px;
}

        .contenedor {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            margin-top:20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 12px 20px;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .grid-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* Divide el contenedor en 4 columnas iguales */
  gap: 20px; /* Espacio entre los elementos del grid */
}

.grid-item {
  background-color: #f2f2f2;
  padding: 20px;
  border: 1px solid #ccc;
  text-align: center;
}

.student-count {
  font-size: 18px;
}
.container {
  padding: 20px;
  border-radius: 5px;
  text-align: center;
}

.page-title {
  font-size: 24px;
  color: #333;
  margin-bottom: 10px;
}

.page-description {
  font-size: 16px;
  color: #666;
}


.table-container {
  margin-bottom: 20px;
}

.data-table {
  width: 100%;
  border-collapse: collapse;
}

.data-table th,
.data-table td {
  padding: 8px;
  border: 1px solid #ccc;
}
    </style>

</style>
</head>

<body>
  <div class="sidebar">
    <div class="sidebar-header">
      <h2>Registro<br>de Notas<br><?php $date = getdate(); echo"<p>".$date['mday']."/".$date['month']."/".$date['year']."</p>";?></h2>
    </div>
    <ul class="menu">
      <li><a href="/app/views/SelectCurso.php"><i class="fa-solid fa-sitemap"></i></i>  Listados</a></li>
      <li><a href="/app/views/inscripcion.php"><i class="fa-solid fa-plus"></i>  Inscripcion</a></li>
      <li><a href="/app/views/registro.php"><i class="fa-solid fa-plus"></i>  Registro</a></li>
      <li><a href="/app/views/planeacion.php"><i class="fa-solid fa-clipboard"></i>  Notas</a></li>
      <li><a href="/app/views/reporte.php"><i class="fa-solid fa-clipboard"></i>  Reporte</a></li>
    </ul>
  </div>

  <main class="content">
    
<div class="row row-cols-1 g-4">
      
<div class="contenedor">
        <h1>Actualizar Nota <br> <?=$_POST['descripcion']?> <br> del curso <br> <?=$obj->getNombCur($_POST['cod_cur'])?></h1>
        <form action="actualizarNota.php" method="POST">
            

            <input type="hidden" name="cod_nota" value="<?=$_POST['cod_nota']?>">
            <input type="hidden" name="cod_cur" value="<?=$_POST['cod_cur']?>">
            <input type="hidden" name="descripcion" value="<?=$_POST['descripcion']?>">
            <input type="hidden" name="porcentaje" value="<?=$_POST['porcentaje']?>">
            <input type="hidden" name="posicion" value="<?=$_POST['posicion']?>">

            <label for="year">Escriba la nueva descripcion:</label>
            <input type="text" name="descripcion" placeholder="<?=$_POST['descripcion']?>" required>
            <br>
            <label for="year">Escriba el nuevo porcentaje:</label>
            <input type="text" name="porcentaje" placeholder="%" required>
            <br>
            <label for="year">Escriba la nueva posición:</label>
            <input type="text" name="posicion" placeholder="<?=$_POST['posicion']?>" required>
            <br><br>
            <input type="submit" name="submit" value="Actualizar Nota">
        </form>
  </div>

<?php if(isset($_POST['submit'])):?>
<?php 

if ($obj->validarPorcentajeActualizar($_POST['porcentaje']*0.01,$_POST['cod_cur'],$_POST['cod_nota']) && strlen($_POST['descripcion'])<=20 && $obj->validarPosicionActualizar($_POST['cod_cur'],$_POST['posicion'],$_POST['cod_nota']) ) {

    $obj->actualizarNota($_POST['cod_nota'],$_POST['cod_cur'],$_POST['descripcion'],$_POST['porcentaje']*0.01,$_POST['posicion']);
    echo("Nota Actualizada!");
}
else if ($obj->validarPorcentajeActualizar($_POST['porcentaje']*0.01,$_POST['cod_cur'],$_POST['cod_nota']) == false) {
  echo  "El porcentaje total es mayor al 100%, ingrese los datos nuevamente por favor";
}
else if (strlen($_POST['descripcion']) > 20) {
  echo  "La descripcion es muy larga, ingrese los datos nuevamente por favor";
}
else if ($obj->validarPosicionActualizar($_POST['cod_cur'],$_POST['posicion'],$_POST['cod_nota']) == false) {
  echo  "La posicion ingresada ya está tomada, ingrese los datos nuevamente por favor";
}
else{
  echo  "Los datos son incorrectos, ingreselos nuevamente por favor";
}


?>
<?php endif; ?>

  <br>
  <center><input type='button'  name='Volver Atrás' value='Volver Atrás' onclick=location.href='http://localhost/app/views/planeacion.php'><br>
  
  </main>
</body>
</html>
