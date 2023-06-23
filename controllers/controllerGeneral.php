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
    public function saveEstudiantes($codEst, $nombEst) {
            $this->model->createEstudiante($codEst, $nombEst);
            header('Location: /app/views/aqui_va_la_vista.php'); 
            //Header es para redirrecionar una vez hecho todo
        }

    public function InscripcionPorCurso($cod_est,$cod_cur,$periodo,$year){
        $this->model->InscribirEstudiante($cod_est,$cod_cur,$periodo,$year);
        header('Location: /app/views/inscripcion.php'); 
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
    
    
        

}
?>
