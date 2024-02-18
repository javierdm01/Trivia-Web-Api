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
            if(empty($questions->results) || $questions==''){
                return $this->view->notFound();
            }
            foreach ($questions->results as $obj) {
                array_push($arrQuestions,estructurarObjeto($obj, "Questions"));
                $amount++;
        }}else{
           $arrQuestions=$questions; 
        }
        $this->view->showQuestion($nQuestion,$arrQuestions,$amount,$win);
        $ran= random_int(0, 3);
        $nColor=0;
        for ($i = 0; $i < (count($arrQuestions[$nQuestion]->getIncorrect_answers())+1) ; $i++) {
            
            if($ran==$i){
                $this->view->showOptions($arrQuestions[$nQuestion]->getCorrect_answer(),$this->color[$nColor]);
                $nColor++;
            }
            if($i<count($arrQuestions[$nQuestion]->getIncorrect_answers())){
                $this->view->showOptions($arrQuestions[$nQuestion]->getIncorrect_answers()[$i],$this->color[$nColor]);
                $nColor++;
            }
        }
        $this->view->endQuestion();
        
    }
    public function checkAnswers() {
        $amount=$_POST['amount']-1;
        $win=$_POST['win'];
        
        $questions= unserialize(base64_decode($_POST['questions']));
        if($_POST['answers']==$questions[$_POST['nQuestion']]->getCorrect_answer()){
            mensajeCheck('¡Excelente! Respuesta correcta ');
            $win++;
        }else{
            mensajeError('¡Lo siento! La respuesta correcta era '.$questions[$_POST['nQuestion']]->getCorrect_answer());
        }
        if($_POST['nQuestion']!=($amount)){
            $this->showQuestions($_POST['nQuestion']+1,$questions,$_POST['amount'],$win);
        }else{
            $this->view->showEnd($win,$_POST['nQuestion']+1);
        }
        
    }
    
    
}
