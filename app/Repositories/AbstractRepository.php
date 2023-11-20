<?php

namespace App\Repositories;

use App\Interfaces\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    abstract public function getModel(): Model;

    public function getQuery(): Builder
    {
        return $this->getModel()->newQuery();
    }

    public function getAll(?array $select = ['*'], ?array $with = []): Collection
    {
        $query = $this->getQuery()->with($with)->select($select);

        return $query->get();
    }

    public function create(array $data): Model
    {
        return $this->getQuery()->create($data);
    }

    public function getById(int $id, ?array $with = [], ?array $select = ['*']): ?Model
    {
        $query = $this->getQuery()->select($select)->where('id', $id);

        if ($with) {
            $query->with($with);
        }

        return $query->firstOrFail();
    }

    public function updateById(int $id, array $data): ?Model
    {
        $model = $this->getById($id);
        $model->update($data);

        return $model;
    }

    public function updateOrCreate(array $conditions, array $data): ?Model
    {
        return $this->getQuery()->updateOrCreate($conditions, $data);
    }

    public function delete(int $id): ?bool
    {
        return $this->getQuery()->where('id', $id)->delete();
    }

    public function restore(int $id): ?bool
    {
        return $this->getQuery()->withTrashed()
            ->where('id', $id)
            ->restore();
    }

    public function insert(array $inserts): int
    {
        return $this->getQuery()->insert($inserts);
    }

    public function destroy(array $ids): int
    {
        return $this->getModel()::destroy($ids);
    }

    public function getByAppUuid(string $appUuid): ?Collection
    {
        return $this->getQuery()->where('app_uuid', $appUuid)->get();
    }

    public function getPagination(int $page, int $perPage): LengthAwarePaginator
    {
        $query = $this->getQuery();

        return $query->paginate(perPage: $perPage, page: $page);
    }
}
