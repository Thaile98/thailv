<?php
namespace App\Repositories;

abstract class EloquentRepository
{
    
    protected $_model;

    
    public function __construct()
    {
        $this->setModel();
    }

    
    abstract public function getModel();

    
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    public function find($id)
    {
        $data = $this->_model->find($id);
        return $data;
    }
}