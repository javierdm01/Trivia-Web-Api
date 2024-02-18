<?php

class CategoriesService{
    function getCategories(){
            $categories = file_get_contents("https://opentdb.com/api_category.php");
            print_r($categories);
            return json_decode($categories);
    }
}