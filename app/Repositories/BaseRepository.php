<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public function create(array $data): Model|Builder
    {
        return $this->getModel()->query()->create($data);
    }

    public function update($id, array $data): ?Model
    {
        $record = $this->find($id);
        $record->update($data);

        return $record;
    }

    public function find($id, ?array $with = []): ?Model
    {
        return $this->getModel()::query()
            ->with($with)->findOrFail($id);
    }

    public function delete(string $id): ?Model
    {
        $entity = $this->find($id);
        $entity->delete();

        return $entity;
    }

    public abstract function getModel(): Model;
}
