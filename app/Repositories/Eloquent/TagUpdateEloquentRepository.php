<?php

namespace App\Repositories\Eloquent;

use App\Models\Tag;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class TagUpdateEloquentRepository extends EloquentRepository
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new Tag());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create(array $data): Tag | Model
    {
        return parent::create($data);
    }

    public function find($id): Tag | Model
    {
        return parent::find($id);
    }

    public function withTrashed(): Builder
    {
        return parent::withTrashed();
    }

    public function update($id, array $data): Tag | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): Tag | Model
    {
        return parent::delete($id);
    }

    public function restore($id): Tag | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): Tag | Model
    {
        return parent::forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return parent::paginate($perPage, $columns, $pageName, $page);
    }
}
