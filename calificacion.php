

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
  <?php
require_once "../controllers/controllerGeneral.php";
    $obj = new controllerGeneral();
    $calificaciones = $obj->getCalificaciones($_POST['cod_nota']);
    print_r($calificaciones);
?>

<div class="row row-cols-1 g-4">


<table class="data-table">
    <thead>
      <tr>
        <th style="background-color:E0D9D9">Codigo</th>
        <th style="background-color:E0D9D9">Nombre</th>
        <th style="background-color:E0D9D9">Nota</th>
        <th style="background-color:E0D9D9">Insertar</th>
        <th style="background-color:E0D9D9">Guardar</th>
        <th style="background-color:E0D9D9">Eliminar</th>
      </tr>
    </thead>
    <tbody>
    <?php if($estudiantes): ?>
      <?php foreach($estudiantes as $estu):?>
      <tr> <td><?=$estu[0]?></td>
       <td><?=$estu[2]?></td>

       <form action="CalificacionProcesado.php" method="POST">
        <?php foreach($calificaciones as $cali):?>  
        <td style="text-align: center;"><input type="text" style="width: 50px;" placeholder="nota" name="valor" value="<?=$cali[1]?>">
        <?php endforeach; ?>
        <?php foreach($nota as $notas):?>  
          <input type="hidden" name="nota" value="<?=$notas[0]?>">
          <?php endforeach; ?>
          <input type="hidden" name="cod_insc" value="<?=$estu[0]?>">
          </td>     
          <td><center><button type="submit" style="padding-top:-15px; border: none; background: none;"><i class="fa-solid fa-floppy-disk fa-2xl" style="color: #1bda28;"></i></button></center></td>
          <td><center><button type="submit" style="padding-top:15px; border: none; background: none;"><i class="fa-solid fa-delete-left fa-2xl" style="color: #d91717;"></i></button></center></td>
        </form></tr> 
       
        <?php endforeach; ?>
       <?php else:  ?>
          <tr>
                <td colspan="3" style="text-align:center">NO HAY REGISTROS</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<label>
  </main>
</body>
</html>
