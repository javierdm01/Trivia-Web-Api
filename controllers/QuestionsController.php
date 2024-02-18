<?php
/**
 * Clase TriviaController
 */
class QuestionsController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $view;
    private $service;
    private $color;

    /**
     * Constructor de la clase ProductoController
     */
    public function __construct() {
        $this->service = new QuestionsService();
        $this->view = new QuestionsView();
        $this->color= Array('primary','success','danger','warning');
    }

    /**
     * MostrarVuelos()
     * Funcion en el controlador, que sirve para intermediar para
     * mostrar los productos
     */
    public function showQuestions($nQuestion=0,$questions=null,$amount=0,$win=0) {
        $arrQuestions=[];
        if($questions==null){
            $questions=$this->service->getQuestions();
            if(empty($questions->results)){
                return $this->view->notFound();
            }
            foreach ($questions->results as $obj) {
                array_push($arrQuestions,estructurarObjeto($obj, "Questions"));
                $amount++;
        }}else{
           $arrQuestions=$questions; 
        }
        $this->view->showQuestion($nQuestion,$arrQuestions,$amount,$win);
        $this->view->showOptions($arrQuestions[$nQuestion]->getCorrect_answer(),$this->color[0]);
        $i=1;
        foreach ($arrQuestions[$nQuestion]->getIncorrect_answers() as $option) {
            $this->view->showOptions($option,$this->color[$i]);
            $i++;
        }
        $this->view->endQuestion();
        
    }
    public function checkAnswers() {
        $amount=$_POST['amount']-1;
        $win=$_POST['win'];
        if($_POST['nQuestion']!=($amount)){
            $questions= unserialize(base64_decode($_POST['questions']));
            if($_POST['answers']==$questions[$_POST['nQuestion']]->getCorrect_answer()){
                mensajeCheck('¡Excelente! Respuesta correcta ');
                $win++;
            }else{
                mensajeError('¡Lo siento! La respuesta correcta era '.$questions[$_POST['nQuestion']]->getCorrect_answer());
            }
            $this->showQuestions($_POST['nQuestion']+1,$questions,$_POST['amount'],$win);
        }else{
            $this->view->showEnd($win,$_POST['nQuestion']+1);
        }
        
    }
    
    
}
