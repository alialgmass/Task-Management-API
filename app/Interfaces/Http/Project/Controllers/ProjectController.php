<?php

namespace App\Interfaces\Http\Project\Controllers;

use App\Domains\Project\Actions\CreateProject;
use App\Domains\Project\DTO\CreateProjectDTO;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Project\Requests\ProjectRequest;
use App\Interfaces\Http\Project\Resources\ProjectResource;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {}
    public function show($id) {}
    public function store(ProjectRequest $request, CreateProject $useCase)
    {
        $dto = new CreateProjectDTO(
            $request->name,
            $request->description
        );

        $project = $useCase->handle($dto);

        return new ProjectResource($project);
    }
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
