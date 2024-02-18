<?php

    class Categories{
        
        private $id;
        private $name;
        
        
        public function __construct() {
        }

        
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function setId($id): void {
            $this->id = $id;
        }

        public function setName($name): void {
            $this->name = $name;
        }







        
        
    }