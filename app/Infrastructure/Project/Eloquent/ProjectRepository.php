<?php

namespace App\Infrastructure\Project\Eloquent;

use App\Domains\Project\Repositories\ProjectRepositoryInterface;
use App\Infrastructure\Project\Models\EloquentProject;
use App\Domains\Project\Models\Project;


class ProjectRepository implements ProjectRepositoryInterface
{
    public function create(Project $project): Project
    {
        $model = EloquentProject::create([
            'name' => $project->name,
            'description' => $project->description,
        ]);

        $project->id = $model->id;

        return $project;
    }

    public function find(int $id): ?Project
    {
        $model = EloquentProject::find($id);

        if (! $model) return null;

        return new Project(
            $model->id,
            $model->name,
            $model->description
        );
    }

    public function update(Project $project): Project
    {
        $model = EloquentProject::findOrFail($project->id);

        $model->update([
            'name' => $project->name,
            'description' => $project->description,
        ]);

        return $project;
    }
}
