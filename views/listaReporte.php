
<?php
require_once "../controllers/controllerGeneral.php";
    $obj=new controllerGeneral();

    if(intval(!is_numeric($_POST['year'])) || $_POST['year']<= 0 ){
      header('Location: /app/views/reporte.php'); 
    }else {
      $estudiantes=$obj->obtenerEstudiantesPorCurso($_POST['cod_cur'],$_POST['year'],$_POST['periodo']);
      $notas=$obj->obtenerNotasPorCurso($_POST['cod_cur']);
    }

    
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Menú</title>
  <style>

    body{
      font-family: Arial, sans-serif;

    }
     .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        select, input[type="text"], input[type="date"] {
            width: 200px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
  
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

.pagination-container {
  text-align: center;
  margin-top: 10px;
}

.pagination-container button {
  margin: 0 5px;
}
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
    <div class="container">
      <h2 class="page-title" style="font-family: Arial, sans-serif; font-size:2rem" >Listado de Estudiantes</h2>
      <br>
      <div class="row row-cols-1 g-4">
  
      <div class="table-container">
      <table class="data-table">
  <thead>
    <tr>
      <th></th>
      <?php foreach ($notas as $nota): ?>
        <th><?= $nota['descrip_nota'] ?></th>
      <?php endforeach; ?>
      <th>Definitiva</th>
    </tr>
    <tr>
      <th>Codigo</th>
      <?php foreach ($notas as $nota): ?>
        <th><?= $nota['porcentaje']*100 . "%" ?></th>
      <?php endforeach; ?>
      <?php
        $sumaPorcentajes = 0;
        foreach ($notas as $nota):
            $porcentaje = $nota['porcentaje'] * 100;
            $sumaPorcentajes += $porcentaje;
            ?>
        <?php endforeach; ?>
        <th><?= $sumaPorcentajes . "%" ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($estudiantes as $cod_est => $estudiante): ?>
      <tr>
        <td><?= $cod_est ?></td>
        <?php foreach ($notas as $nota): ?>
          <td>
            <?php $descrip_nota = $nota['descrip_nota']; ?>
            <?php if (isset($estudiante['notas'][$descrip_nota])): ?>
              <?php $nota_estudiante = $estudiante['notas'][$descrip_nota]['valor']; ?>
              <?php $porcentaje = $nota['porcentaje'];?>
              <?= $nota_estudiante?><br>
            <?php endif; ?>
          </td>
        <?php endforeach; ?>
        <?php
            $definitiva = 0;
            foreach ($notas as $nota):
              $descrip_nota = $nota['descrip_nota'];
              if (isset($estudiante['notas'][$descrip_nota])) {
                $nota_estudiante = $estudiante['notas'][$descrip_nota]['valor'];
                $porcentaje = $nota['porcentaje'];
                $definitiva += $nota_estudiante * $porcentaje;
              }
          ?>
          <?php endforeach; ?>
          <td><?= $definitiva ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

</div>
<br><br>
<center>
<input type='button' name='Volver Atrás' value='Volver Atrás' onclick="location.href='http://localhost/app/views/reporte.php'"><br>
<br>
<form action="generar_reporte.php" method="POST" target="_blank">
  <input type="hidden" name="cod_cur" value="<?=$_POST['cod_cur']?>">
  <input type="hidden" name="year" value="<?=$_POST['year']?>">
  <input type="hidden" name="periodo" value="<?=$_POST['periodo']?>">
  <input type="submit" value="Generar Reporte">
</form>
            </center>
<br>
</div>
    </div>
  </main>
<br><br><br>

</body>
</html>
