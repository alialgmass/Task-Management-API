<?php

namespace App\Domains\Project\Repositories;

use App\Domains\Project\Models\Project;

interface ProjectRepositoryInterface
{
    public function create(Project $project): Project;
    public function find(int $id): ?Project;
    public function update(Project $project): Project;
}
