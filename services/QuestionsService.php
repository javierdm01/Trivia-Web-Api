<?php

class QuestionsService{
    function getQuestions() {
        if (isset($_POST["submit"])) {
                $amount=$_POST['amount'];
                $category=$_POST['category']!='Any Category'  ? '&category='.$_POST['category'] : '';
                $difficulty=$_POST['difficulty']!='Any Difficulty' ? '&difficulty='.$_POST['difficulty'] : '';
                $type='';
                switch ($_POST['type']) {
                    case 'Multiple Choice':
                        $type= '&type=multiple';
                        break;
                    case 'True / False':
                        $type= '&type=boolean';
                        break;
                }
                $link="https://opentdb.com/api.php?amount=".$amount.$category.$difficulty.$type;
                try {
                    $trivia = file_get_contents($link);
                    return json_decode($trivia);
                } catch (Exception ) {
                    return '';
                }

                
        }
    }   
}