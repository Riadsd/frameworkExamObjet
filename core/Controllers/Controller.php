<?php 

namespace Controllers;

abstract Class Controller

{

    protected $model;

    protected $modelName;


    public function __construct(){

        $this->model = new $this->modelName();
    }

}