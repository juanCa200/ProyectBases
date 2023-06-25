<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Table</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php  
        include("conexion.php");
        $conn = new Connection();
        echo"<p>Registro de Notas</p>";
        $date = getdate();
        echo"<p>".$date['mday']."/".$date['month']."/".$date['year']."</p>";
        
        echo"<form action='verEstudiantes.php' method='POST'><center>";   
            echo"<p>Seleccione  un curso</p>";
            echo"<select name='cod_cur'>";
            $tables = $conn->get_cursos();
                foreach($tables as $row){
                    echo"<option value='".$row[0]."'>".$row[1]."</option>";
                }
                echo"</select><br>";
                
                echo"<input name='year' placeholder='Año'></input>";    
            
                
            echo"<select name='periodo'>";    
                    echo"<option value='1'>Periodo 1</option>";
                    echo"<option value='2'>Periodo 2</option>";    
                echo"</select><br><br>";
            echo"<input type='submit' value='Ver Estudiantes'>";
        echo"</form></center>";
        
    ?>
    

</body>
</html>