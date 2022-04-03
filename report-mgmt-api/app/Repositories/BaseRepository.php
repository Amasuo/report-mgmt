<?php

namespace App\Repositories;

use App\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
    public function update(int $id, array $attributes): Model
    {
        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();
        return $model;
    }
    public function delete(int $id): bool
    {
        $model = $this->model->findOrFail($id);
        return $model->delete($id);
    }
}
