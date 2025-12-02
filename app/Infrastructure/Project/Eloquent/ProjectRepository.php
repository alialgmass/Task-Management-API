<?php

namespace App\Infrastructure\Project\Eloquent;

use App\Domains\Project\Repositories\ProjectRepositoryInterface;
use App\Models\Project as EloquentModel;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function all() { return EloquentModel::all(); }
    public function find($id) { return EloquentModel::find($id); }
    public function create(array $data) { return EloquentModel::create($data); }
    public function update($id, array $data) { return EloquentModel::find($id)?->update($data); }
    public function delete($id) { return EloquentModel::find($id)?->delete(); }
}