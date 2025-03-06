<?php

namespace App\Repositories;

abstract class BaseRepository{

     /**
     * @var 
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param mixed $model
     */
    public function __construct($model){
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function findAll(){
        return $this->model->all();
    }


    /**
     * @param mixed $paginate
     * 
     * @return mixed
     */
    public function findAllPaginated($paginate){
        return $this->model->paginate($paginate);
    }

    /**
     * @param mixed $id
     * 
     * @return mixed
     */
    public function findById($id){
        return $this->model-> findOrFail($id);
    }


    /**
     * @param array $data
     * 
     * @return mixed
     */
    public function create(array $input){
        return $this->model->create($input);
    }


    /**
     * @param mixed $id
     * @param array $input
     * 
     * @return mixed
     */
    public function update($id, array $input){
        return $this->model->where('id', $id)->update($input);
    }


    /**
     * @param mixed $id
     * 
     * @return mixed
     */
    public function softDelete($id){
        return $this->model->where('id', $id)->delete();
    }


    /**
     * @param mixed $id
     * 
     * @return mixed
     */
    public function restoreSoftDeleted($id){
        return $this->model->where('id', $id)->restore();
    }


    public function forceDelete($id){
        return $this->model->where('id', $id)->forceDelete();
    }

}