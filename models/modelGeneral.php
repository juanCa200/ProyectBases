<?php
/* Esto es para que muestre los Errores en pantalla, cuando tenga */
ini_set('display_errors', 'On');
error_reporting(E_ALL);
class modelGeneral {
    private $conn;

    public function __construct() {
        require_once '../config/Conexion.php';
        $this->conn = CConexion::ConexionBD();
    }

    public function createEstudiante($codEst,$nombEst) {
        // Preparar la consulta de inserción
        $query = "INSERT INTO estudiantes(cod_est, nomb_est) VALUES (:cod_est,:nomb_est)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cod_est', $codEst);
        $stmt->bindParam(':nomb_est', $nombEst);
        return $stmt->execute();
    }
    
    
    public function eliminarEstudiantes($cod_est) {
        // Preparar la consulta de inserción
        $query = "DELETE FROM inscripciones 
                  WHERE cod_est = '$cod_est'";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }
    
        public function obtenerNotasPorCurso($cod_cur) {
        $query = "SELECT descrip_nota, porcentaje 
                  FROM notas 
                  WHERE cod_cur = :cod_curso";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cod_curso', $cod_cur, PDO::PARAM_INT);
        $stmt->execute();
        $notas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $notas;
    }


    public function obtenerEstudiantesPorCurso($cod_cur,$year,$periodo) {
        $query = "SELECT e.cod_est, e.nomb_est, c.valor, n.descrip_nota, n.porcentaje
                  FROM estudiantes e 
                  JOIN inscripciones i ON e.cod_est = i.cod_est
                  JOIN calificaciones c ON i.cod_insc = c.cod_insc
                  JOIN notas n ON n.nota = c.nota 
                  WHERE i.cod_cur = :cod_curso 
                  AND i.year = $year
                  AND i.periodo = $periodo
                  ORDER BY e.cod_est";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cod_curso', $cod_cur, PDO::PARAM_INT);
        $stmt->execute();
    
        $estudiantes = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cod_est = $row['cod_est'];
            $nomb_est = $row['nomb_est'];
            $valor = $row['valor'];
            $descrip_nota = $row['descrip_nota'];
            $porcentaje = $row['porcentaje'];
    
            $nota = array('valor' => $valor, 'porcentaje' => $porcentaje);
    
            if (!isset($estudiantes[$cod_est])) {
                $estudiantes[$cod_est] = array('nombre' => $nomb_est, 'notas' => array());
            }
    
            $estudiantes[$cod_est]['notas'][$descrip_nota] = $nota;
        }
    
        return $estudiantes;
    }

    public function getAllcursos() {
        // Preparar la consulta de inserción
        $query = "SELECT * FROM cursos";
        $stmt = $this->conn->prepare($query);
        return($stmt->execute()) ? $stmt->fetchAll(): false;
    }
    
    public function getAllestudiantes() {
        // Preparar la consulta de inserción
        $query = "SELECT * FROM estudiantes";
        $stmt = $this->conn->prepare($query);
        return($stmt->execute()) ? $stmt->fetchAll(): false;
    }

    public function IngresarUsuario($user, $password) {
        return ($user==="reyes" && $password==="160004728");
    }


    public function getEstudiantes($cod_cur,$year,$periodo){

        if ($cod_cur && $year && $periodo) {
            $query = "SELECT i.cod_est, e.nomb_est 
                      FROM inscripciones i 
                      join estudiantes e 
                      on i.cod_est = e.cod_est 
                      where cod_cur = $cod_cur 
                      and year = $year 
                      and periodo = $periodo";
            $stmt = $this->conn->prepare($query);
            return($stmt->execute()) ? $stmt->fetchAll(): false;
        }else {
            return 0;
        }
        
    }

    public function getPlaneacion($cod_cur){

        if ($cod_cur) {
            $query = "SELECT posicion,descrip_nota,porcentaje,nota 
                      FROM notas 
                      where cod_cur = $cod_cur 
                      order by posicion";
            $stmt = $this->conn->prepare($query);
            return($stmt->execute()) ? $stmt->fetchAll(): false;
        }else {
            return 0;
        }
        
    }
    
    public function InscribirEstudiante($cod_est,$cod_cur,$periodo,$anio){
        try {
            $query = "INSERT INTO inscripciones(periodo,year,cod_cur,cod_est) 
                      values ($periodo, $anio, $cod_cur,$cod_est)";
            $stmt = $this->conn->prepare($query);    
            return $stmt->execute();
            }
        
        catch (PDOException $exception){
            return 'Error: ' . $exception->getMessage();
        }

    }

    public function validarInscripcion($cod_est,$cod_cur,$periodo,$anio){

        $query = $this->conn->query("SELECT count(*)
                                     from inscripciones 
                                     where cod_est = $cod_est 
                                     and cod_cur = $cod_cur 
                                     and periodo = $periodo 
                                     and year = $anio;");
        
        foreach($query as $row){
            $count = $row[0];
        }

        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getNombCur($cod_cur){
        
        $query = $this->conn->query("SELECT nomb_cur 
                                    from cursos 
                                    where cod_cur = $cod_cur;");
       
        foreach($query as $row){
            $nomb_cur = $row[0];
        }

        return $nomb_cur;
    }

    public function validarPorcentaje($porcentaje,$cod_cur){

        $query = $this->conn->query("SELECT SUM(porcentaje)
                                     from notas 
                                     where cod_cur = $cod_cur;");
        
        foreach($query as $row){
            $sum = $row[0];
        }

        if ($sum+$porcentaje <= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function validarPorcentajeActualizar($porcentaje_nuevo,$cod_cur,$cod_nota){

        $query = $this->conn->query("SELECT 
                                     SUM(porcentaje) 
                                     from notas 
                                     where cod_cur = $cod_cur;");
        
        foreach($query as $row){
            $sum = $row[0];
        }

        $query = $this->conn->query("SELECT porcentaje
                                     from notas 
                                     where nota = $cod_nota;");

        foreach($query as $row){
            $porcentaje_antiguo = $row[0];
        }

        if ($sum+$porcentaje_nuevo-$porcentaje_antiguo <= 1) {
            return true;
        } else {
            return false;
        }
    }


    public function agregarNota($cod_cur,$descrip_nota,$porcentaje,$posicion){
        try {
                $query = "INSERT INTO notas(cod_cur,descrip_nota,porcentaje,posicion)
                          values ($cod_cur,'$descrip_nota',$porcentaje,$posicion);";
                $stmt = $this->conn->prepare($query);    
                return $stmt->execute();
        }
        catch (PDOException $exception){
            return 'Error: ' . $exception->getMessage();
        }

    }

    public function validarPosicion($cod_cur,$posicion){

        $query = $this->conn->query("SELECT count(*)
                                     from notas
                                     where cod_cur = $cod_cur 
                                     and posicion = $posicion;");
        
        foreach($query as $row){
            $count = $row[0];
        }

        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function validarCodEst($cod_est){

        $query = $this->conn->query("SELECT count(*)
                                     from estudiantes
                                      where cod_est = $cod_est;");
        
        foreach($query as $row){
            $count = $row[0];
        }

        if ($count == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function validarPosicionActualizar($cod_cur,$posicion,$cod_nota){

        $query = $this->conn->query("SELECT count(*)
                                     from notas
                                     where cod_cur = $cod_cur
                                     and posicion = $posicion
                                     and nota != $cod_nota");
        
        foreach($query as $row){
            $count = $row[0];
        }

        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarNota($cod_nota) {
        // Preparar la consulta de inserción
        $query = "DELETE FROM notas
                  WHERE nota = '$cod_nota'";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }

    public function actualizarNota($cod_nota,$cod_cur,$descrip_nota,$porcentaje,$posicion) {
        // Preparar la consulta de inserción
        $query = "UPDATE notas 
                  SET cod_cur = $cod_cur , 
                  descrip_nota = '$descrip_nota', 
                  porcentaje = $porcentaje, 
                  posicion = $posicion 
                  WHERE nota = $cod_nota";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }

    public function getCalificaciones($cod_nota,$cod_cur){
        $query =   "SELECT i.cod_est, e.nomb_est, nc.valor, n.nota, i.cod_insc, nc.cod_cal
                    FROM (
                        SELECT DISTINCT cod_est, cod_cur, cod_insc
                        FROM inscripciones
                        WHERE cod_cur = $cod_cur
                    ) i
                    JOIN estudiantes e ON e.cod_est = i.cod_est
                    LEFT JOIN (
                        SELECT c.cod_insc, c.valor, c.nota, c.cod_cal
                        FROM calificaciones c
                        JOIN notas n ON n.nota = c.nota
                        WHERE n.nota = $cod_nota
                    ) nc ON nc.cod_insc = i.cod_insc
                    JOIN notas n ON n.nota = nc.nota OR nc.nota IS NULL
                    where n.nota = $cod_nota
                    ORDER BY e.nomb_est;

";
        $stmt = $this->conn->prepare($query);
        return($stmt->execute()) ? $stmt->fetchAll(): false;
    }

    public function registgrarCalificacion($valor,$nota,$cod_insc){
        try {
            $fecha = date('Y-m-d');
            $query = "INSERT into calificaciones (valor,fecha,nota,cod_insc)
                      values ($valor,'$fecha',$nota,$cod_insc);";
            $stmt = $this->conn->prepare($query);    
            return $stmt->execute();
            }
        
        catch (PDOException $exception){
            return 'Error: ' . $exception->getMessage();
        }

    }

    public function eliminarCalificacion($cod_cal) {
        // Preparar la consulta de inserción
        $query = "DELETE FROM calificaciones
                  WHERE cod_cal = '$cod_cal'";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }

    public function validarCalificacion($cod_insc){

        $query = $this->conn->query("SELECT count(*)
                                     from calificaciones 
                                     where cod_insc = $cod_insc;");
        
        foreach($query as $row){
            $count = $row[0];
        }

        if ($count == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getNombNota($cod_nota){
        
        $query = $this->conn->query("SELECT descrip_nota
                                     from notas  
                                     where nota = $cod_nota;");
       
        foreach($query as $row){
            $nomb_cur = $row[0];
        }

        return $nomb_cur;
    }

    public function validarValor($cod_insc, $nota){

        $query = $this->conn->query("SELECT count(*)
                                     from calificaciones
                                     where cod_insc = $cod_insc
                                     and nota = $nota;");
        
        foreach($query as $row){
            $count = $row[0];
        }

        if ($count == 1) {
            return true;
        } else {
            return false;
        }
    }



}
?>
