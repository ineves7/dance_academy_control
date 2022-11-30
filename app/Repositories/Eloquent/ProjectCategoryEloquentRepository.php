<?php

namespace App\Repositories\Eloquent;

use App\Models\ProjectCategory;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ProjectCategoryEloquentRepository extends EloquentRepository
{
    public function __construct()
    {
        parent::__construct(new Projectcategory());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create($data): Projectcategory | Model
    {
        return parent::create($data);
    }

    public function find($id): Projectcategory | Model
    {
        return parent::find($id);
    }

    public function withTrashed(): Builder
    {
        return parent::withTrashed();
    }

    public function update($id, $data): Projectcategory | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): Projectcategory | Model
    {
        return parent::delete($id);
    }

    public function restore($id): Projectcategory | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): Projectcategory | Model
    {
        return parent::forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return parent::paginate($perPage, $columns, $pageName, $page);
    }
}
