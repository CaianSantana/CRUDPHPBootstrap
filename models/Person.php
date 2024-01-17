<?php
class Person{
    private $name, $fname;

    public function __construct($name, $fname){
        $this->name = $name;
        $this->fname = $fname;
    }
    public function getName(){
        return $this->name;
    }
    public function getFName(){
        return $this->fname;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setFName($fname){
        $this->fname = $fname;
    }
}