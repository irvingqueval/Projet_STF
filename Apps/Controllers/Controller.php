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
                throw new \Exception("Le modèle spécifié '{$this->modelName}' ne peut pas être chargé car la classe n'existe pas.");
            }
            $this->model = new $this->modelName();
        } else {
            $this->model = null;
        }
    }
}
