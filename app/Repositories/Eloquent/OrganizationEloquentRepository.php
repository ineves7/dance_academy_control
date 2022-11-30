<?php

namespace App\Repositories\Eloquent;

use App\Models\Organization;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class OrganizationEloquentRepository extends EloquentRepository
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new Organization());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create(array $data): Organization | Model
    {
        return parent::create($data);
    }

    public function find($id): Organization | Model
    {
        return parent::find($id);
    }

    public function withTrashed(): Builder
    {
        return parent::withTrashed();
    }

    public function update($id, array $data): Organization | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): Organization | Model
    {
        return parent::delete($id);
    }

    public function restore($id): Organization | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): Organization | Model
    {
        return parent::forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return parent::paginate($perPage, $columns, $pageName, $page);
    }
}
