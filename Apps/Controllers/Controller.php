<?php

namespace Apps\Controllers;

abstract class Controller
{
    protected $model;
    protected $modelName;

    public function __construct()
    {
        if ($this->modelName) {
            if (!class_exists($this->modelName)) {
                throw new \Exception("The specified model '{$this->modelName}' cannot be loaded because the class does not exist.");
            }
            $this->model = new $this->modelName();
        } else {
            $this->model = null;
        }
    }
}
