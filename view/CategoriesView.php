<?php
class CategoriesView{
    function showForm(){
        echo '<div class="w-50 mx-auto"><h1 class="text-center">PLAY TRIVIA</h1><form action="./index.php?controller=Questions&action=showQuestions" method="POST" class="d-flex flex-column">'
        . '<label>Number of Questions:</label><input type="number" min=1 max=50 value=10 name="amount" required>'
        . '<label>Select Category: </label><select name=category><option name="Any Category">Any Category</option>';
    }
    
    function selectDifficulty(){
        echo '</select><label>Select Difficulty: </label><select name="difficulty"><option>Any Difficulty</option><option name="Easy">Easy</option><option name="Medium">Medium</option><option name="Hard">Hard</option></select>';
    }
    function selectType(){
         echo '<label>Select Type : </label><select name="type"><option>Any Type</option><option name="Multiple Choice">Multiple Choice</option><option name="True / False">True / False</option></select>';
    }
    function endFormLabel(){
        echo '<input type="submit" name="submit" class="btn btn-primary mt-3" value="Generate Questions"></form></div>';
    }
    function importSelect($category){
        echo '<option value="'.$category->getId().'" name="'.$category->getId().'">'.$category->getName().'</option>';
    }
    
}