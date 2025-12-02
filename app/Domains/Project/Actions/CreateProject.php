<?php

namespace App\Domains\Project\Actions;

use App\Domains\Project\DTO\CreateProjectDTO;
use App\Domains\Project\Models\Project;
use App\Domains\Project\Repositories\ProjectRepositoryInterface;

class CreateProject
{
    public function __construct(private ProjectRepositoryInterface $repo) {}

    public function handle(CreateProjectDTO $dto): Project
    {
        $project = new Project(null, $dto->name, $dto->description);

        return $this->repo->create($project);
    }
}
