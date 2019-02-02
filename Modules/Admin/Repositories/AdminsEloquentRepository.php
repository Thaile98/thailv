<?php
namespace Modules\Admin\Repositories;

use App\Repositories\RepositoryInterface;

abstract class AdminsEloquentRepository implements RepositoryInterface
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

    public function getAll()
    {
        return $this->_model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->_model->findOrFail($id);
        return $result;
    }

    
    public function delete($id)
    {
        $result = $this->_model->findOrFail($id);
        $result->delete();
        return true;
    }

    public function getAllWithIdAndName()
    {
        return $this->_model->select('id','name')->get();
    }
}