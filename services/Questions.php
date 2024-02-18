<?php

    class Questions{
        
        private $type;
        private $difficulty;
        private $category;
        private $question;
        private $correct_answer;
        private $incorrect_answers;
        
        
        public function __construct() {
        }

        
        public function getType() {
            return $this->type;
        }

        public function getDifficulty() {
            return $this->difficulty;
        }

        public function getCategory() {
            return $this->category;
        }

        public function getQuestion() {
            return $this->question;
        }

        public function getCorrect_answer() {
            return $this->correct_answer;
        }

        public function getIncorrect_answers() {
            return $this->incorrect_answers;
        }

        public function setType($type): void {
            $this->type = $type;
        }

        public function setDifficulty($difficulty): void {
            $this->difficulty = $difficulty;
        }

        public function setCategory($category): void {
            $this->category = $category;
        }

        public function setQuestion($question): void {
            $this->question = $question;
        }

        public function setCorrect_answer($correct_answer): void {
            $this->correct_answer = $correct_answer;
        }

        public function setIncorrect_answers($incorrect_answers): void {
            $this->incorrect_answers = $incorrect_answers;
        }





        
        
    }