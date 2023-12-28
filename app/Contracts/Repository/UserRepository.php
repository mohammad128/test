<?php

namespace App\Contracts\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface UserRepository
{
    public function create(array $data): Model|Builder;
    public function update($id, array $data): ?Model;
    public function find($id, ?array $with = []): ?Model;
    public function delete(string $id): ?Model;
}
