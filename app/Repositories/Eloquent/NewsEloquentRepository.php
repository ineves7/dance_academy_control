<?php

namespace App\Repositories\Eloquent;

use App\Models\News;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class NewsEloquentRepository extends EloquentRepository
{
    public function __construct()
    {
        parent::__construct(new News());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create($data): News | Model
    {
        return parent::create($data);
    }

    public function find($id): News | Model
    {
        return parent::find($id);
    }

    public function withTrashed(): Builder
    {
        return parent::withTrashed();
    }

    public function update($id, $data): News | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): News | Model
    {
        return parent::delete($id);
    }

    public function restore($id): News | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): News | Model
    {
        return parent::forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return parent::paginate($perPage, $columns, $pageName, $page);
    }
}
