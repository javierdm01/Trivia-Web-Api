<?php
/**
 * Clase TriviaController
 */
class CategoriesController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $view;
    private $service;

    /**
     * Constructor de la clase ProductoController
     */
    public function __construct() {
        $this->service = new CategoriesService();
        $this->view = new CategoriesView();
    }

    /**
     * MostrarVuelos()
     * Funcion en el controlador, que sirve para intermediar para
     * mostrar los productos
     */
    public function showViewQuestions() {
        $this->view->showForm();
        $category=$this->service->getCategories();
        foreach ($category->trivia_categories as $cat) {
            $categories= estructurarObjeto($cat, "Categories");
            $this->view->importSelect($categories);
        }  
         
        $this->view->selectDifficulty();
        $this->view->selectType();
        $this->view->endFormLabel();
    }
    
}
