<?php

namespace App\Base;

use App\Interfaces\DtoInsertInterface;
use App\Interfaces\DtoInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;

abstract class BaseCrud
{
    public function list(array $data = [], array $with = [])
    {
        return $this->query()
            ->filter($data)
            ->with($with)
            ->paginate();
    }

    public function create(DtoInterface $data)
    {
        $class = $this->getModelClass();
        $model = new $class();
        $model = $model->create($data->dbData());
        return $model;
    }

    public function update(DtoInterface $data, BaseModel|int $model): BaseModel|User
    {
        $model = $this->find($model);
        $model->update($data->dbData());

        return $model;
    }

    public function delete(BaseModel|int $model)
    {
        $model = $this->find($model);
        return $model->delete();
    }

    public function insert(DtoInsertInterface $dto): bool
    {
        $class = $this->getModelClass();
        $model = new $class();

        return $model::insert($dto->dbManyData()); 
    }

    /**
     * @param $id
     * @return mixed
     * @throws InvalidArgumentException
     * @throws ModelNotFoundException
     */
    public function find(BaseModel|int $model)
    {
        if ($model instanceof BaseModel) {
            return $model;
        }
        $class = $this->getModelClass();
        return $class::findOrFail($model);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws InvalidArgumentException
     */
    protected function query()
    {
        $class = $this->getModelClass();
        
        return $class::query()
            ->orderBy('id', 'desc');
    }

    /**
     * @return BaseModel | string
     * @throws InvalidArgumentException
     */
    protected function getModelClass()
    {
        if (property_exists($this, 'modelClass')) {
            return $this->modelClass;
        }

        throw new InvalidArgumentException(get_class($this) . ' modelClass property not implemented');
    }
}