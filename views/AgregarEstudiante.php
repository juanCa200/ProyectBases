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
        echo"<p>Registro de Estudiantes</p>";
        $date = getdate();
        echo"<p>".$date['mday']."/".$date['month']."/".$date['year']."</p>";

        $actualPage = $_SERVER['PHP_SELF'];
        

        echo"<form action= $actualPage method='POST'><center> ";   
                
            echo" <input name='cod_est' placeholder='codigo estudiantil'></input>";    

            echo"<input name='nomb_est' placeholder='nombre del estudiante'></input>";    
            
            echo"<input type='submit' value='Agregar Estudiante'>";
        echo"</form></center>";

        if(isset($_POST['submit'])){
            
            $cod_est = $_POST['cod_est'];
            $nomb_est = $_POST['nomb_est'];
            #creo que cuando dice agregar estudiante, se refiere a agregar un estudiante existente a un curso
            #$conn->AgregarEstudiante($cod_est,$nomb_est);
            echo "Agregado Correctamente";
            
        } 
    ?>
    <h1><center><input type="button" onclick="location.href='http://localhost/Notas%20Parciales/Models/SelectCurso.php'" name="volver atrás" value="volver atrás"></h1>

</body>
</html>