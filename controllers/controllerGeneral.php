<?php
/* Esto es para que muestre los Errores en pantalla, cuando tenga */
ini_set('display_errors', 'On');
error_reporting(E_ALL);

class controllerGeneral {
    private $model;

    /* Inicializamos LA VARIABLE $model con el objeto model para llamar las funciones del modelo general*/
    public function __construct() {
        require_once '../models/modelGeneral.php';
        $this->model = new modelGeneral();
    }

    /* Para guardar, por ahora no usamos la funcion pero asi funciona */
    public function saveEstudiantes($cod_est,$nomb_est) {
            $this->model->createEstudiante($cod_est,$nomb_est);
        }
        public function eliminarEstudiantes($cod_est) {
            $this->model->eliminarEstudiantes($cod_est);
            header('Location: /app/views/SelectCurso.php'); 
            //Header es para redirrecionar una vez hecho todo
        }

    public function InscripcionPorCurso($cod_est,$cod_cur,$periodo,$year){
        $this->model->InscribirEstudiante($cod_est,$cod_cur,$periodo,$year); 
    }

    public function getPlaneacion($cod_cur) {
        return ($this->model->getPlaneacion($cod_cur)) ? $this->model->getPlaneacion($cod_cur): false;
        }

    /* getAll = obtener todo pero cursos */    
    public function getAllcursos() {
           return ($this->model->getAllcursos()) ? $this->model->getAllcursos(): false;
        }     
    
        /* getAll = obtener todo pero estudiantes  */    
    public function getAllestudiantes() {
            return ($this->model->getAllestudiantes()) ? $this->model->getAllestudiantes(): false;
            //Un if pero mas sencillo
         }    

    public function getEstudiantes($cod_cur,$year,$periodo) {
    return ($this->model->getEstudiantes($cod_cur,$year,$periodo)) ? $this->model->getEstudiantes($cod_cur,$year,$periodo): false;
    }

    public function getNombCur($cod_cur) {
        return ($this->model->getNombCur($cod_cur)) ? $this->model->getNombCur($cod_cur): false;
        }
    
    public function validarPorcentaje($porcentaje,$cod_cur) {
        return ($this->model->validarPorcentaje($porcentaje,$cod_cur)) ? $this->model->validarPorcentaje($porcentaje,$cod_cur): false;
    }

    public function validarPorcentajeActualizar($porcentaje,$cod_cur,$cod_nota) {
        return ($this->model->validarPorcentajeActualizar($porcentaje,$cod_cur,$cod_nota)) ? $this->model->validarPorcentajeActualizar($porcentaje,$cod_cur,$cod_nota): false;
    }

    public function  validarInscripcion($cod_est,$cod_cur,$periodo,$anio) {
        return ($this->model-> validarInscripcion($cod_est,$cod_cur,$periodo,$anio)) ? $this->model-> validarInscripcion($cod_est,$cod_cur,$periodo,$anio): false;
    }
    
    public function  validarCodEst($cod_est) {
        return ($this->model-> validarCodEst($cod_est)) ? $this->model->validarCodEst($cod_est): false;
    }

    public function agregarNota($cod_cur,$descrip_nota,$porcentaje,$posicion){
        $this->model->agregarNota($cod_cur,$descrip_nota,$porcentaje,$posicion);
    }

    public function validarPosicion($cod_cur,$posicion){
        return ($this->model->validarPosicion($cod_cur,$posicion)) ? $this->model->validarPosicion($cod_cur,$posicion): false;
    }

    public function validarPosicionActualizar($cod_cur,$posicion,$cod_nota){
        return ($this->model->validarPosicionActualizar($cod_cur,$posicion,$cod_nota)) ? $this->model->validarPosicionActualizar($cod_cur,$posicion,$cod_nota): false;
    }

    public function eliminarNota($cod_nota) {
        $this->model->eliminarNota($cod_nota);
        header('Location: /app/views/planeacion.php'); 
    }

    public function actualizarNota($cod_nota,$cod_cur,$descrip_nota,$porcentaje,$posicion){
        $this->model->actualizarNota($cod_nota,$cod_cur,$descrip_nota,$porcentaje,$posicion);
    }
    
    
  public function obtenerNotasPorCurso($cod_cur) {
    return ($this->model->obtenerNotasPorCurso($cod_cur)) ? $this->model->obtenerNotasPorCurso($cod_cur): false;
    }  

    public function obtenerEstudiantesPorCurso($cod_cur,$year,$periodo){
            return ($this->model->obtenerEstudiantesPorCurso($cod_cur,$year,$periodo)) ? $this->model->obtenerEstudiantesPorCurso($cod_cur,$year,$periodo): false;
           }
     

    public function getCalificaciones($cod_nota,$cod_cur) {
        return ($this->model->getCalificaciones($cod_nota,$cod_cur));
        }
    
    public function registgrarCalificacion($valor,$nota,$cod_insc){
        return ($this->model->registgrarCalificacion($valor,$nota,$cod_insc));
    }

    public function eliminarCalificacion($cod_cal){
        $this->model->eliminarCalificacion($cod_cal);
    }

    public function validarCalificacion($cod_insc){
        return ($this->model->validarCalificacion($cod_insc));
    }

    public function getNombNota($cod_nota){
        return ($this->model->getNombNota($cod_nota));
    }

    public function validarValor($cod_insc, $nota){
        return ($this->model->validarValor($cod_insc, $nota));
    }
    
}
?>
