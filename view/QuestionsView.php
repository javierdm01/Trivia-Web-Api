<?php
class QuestionsView{
    function showQuestion($nQuestion,$questions,$amount,$win){
        echo '<div class="w-75 mx-auto mb-5" mx-auto text-center">'
        . '<h2 class="text.center">Question #'.($nQuestion+1).'</h2>'
        . '<h3 class="text.center">Difficulty: '.$questions[$nQuestion]->getDifficulty().' - Category: '.$questions[$nQuestion]->getCategory().'</h3><br>'
                . '<h4 class="text.center">'.$questions[$nQuestion]->getQuestion().'</h4><form method="POST" action="./index.php?controller=Questions&action=checkAnswers">'
                . '<input type="hidden" name="questions" value="'. base64_encode(serialize($questions)).'"><input type="hidden" name="win" value="'.$win.'"><input type="hidden" name="nQuestion" value="'.$nQuestion.'"><input type="hidden" name="amount" value="'.$amount.'"><div class="d-flex flex-wrap">';
    }
    
    function showOptions($option,$color){
        echo '<div class="w-50 mt-2"><input class="btn btn-'.$color.' mx-auto" type="submit" name="answers" value="'.$option.'"></div>';
    }
    function endQuestion(){
        echo '</div></form></div>';
    }
     function showEnd($results,$count){
        echo '<div class="d-flex flex-column justify-content-center align-items-center"><h4 class="text-center" >Fin de las preguntas</h4><p> Has acertado '.$results.'/'.$count.'</p>'
         . '<a class="btn btn-primary mx-auto mt-5" href="./index.php?controller=Categories&action=showViewQuestions">Go Back</a></div>';
    }
    function notFound(){
       echo '<h4>Not Find Questions whit this filters</h4>'
         . '<a class="btn btn-primary" href="./index.php?controller=Categories&action=showViewQuestions">Go Back</a>';
    }
    
}