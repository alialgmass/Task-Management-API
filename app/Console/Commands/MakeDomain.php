<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeDomain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:domain {name : The name of the domain}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $domain = $this->argument('name');

        $this->info("Creating domain: $domain");

        // Domain Layers
        $domainLayers = [
            "Models",
            "Services",
            "DTO",
            "Repositories",
            "Actions",
            "Rules",
            "Jobs",
            "Events",
            "Exceptions",
        ];

        foreach ($domainLayers as $layer) {
            $path = base_path("app/Domains/$domain/$layer");
            File::ensureDirectoryExists($path);
        }

        // Infrastructure Layer
        $infraPath = base_path("app/Infrastructure/$domain/Eloquent");
        File::ensureDirectoryExists($infraPath);

        // HTTP Layer
        $httpLayers = ["Controllers", "Requests", "Resources"];
        foreach ($httpLayers as $layer) {
            $path = base_path("app/Interfaces/Http/$domain/$layer");
            File::ensureDirectoryExists($path);
        }

        // === Create CRUD skeleton files ===

        // Domain Model
        $modelFile = base_path("app/Domains/$domain/Models/{$domain}.php");
        if (!File::exists($modelFile)) {
            File::put($modelFile, "<?php\n\nnamespace App\Domains\\$domain\Models;\n\nclass $domain\n{\n    // Domain model properties and methods here\n}");
        }

        // Service
        $serviceFile = base_path("app/Domains/$domain/Services/{$domain}Service.php");
        if (!File::exists($serviceFile)) {
            File::put($serviceFile, "<?php\n\nnamespace App\Domains\\$domain\Services;\n\nclass {$domain}Service\n{\n    // Business logic here\n}");
        }

        // Repository Interface
        $repoInterface = base_path("app/Domains/$domain/Repositories/{$domain}RepositoryInterface.php");
        if (!File::exists($repoInterface)) {
            File::put($repoInterface, "<?php\n\nnamespace App\Domains\\$domain\Repositories;\n\ninterface {$domain}RepositoryInterface\n{\n    public function all();\n    public function find(\$id);\n    public function create(array \$data);\n    public function update(\$id, array \$data);\n    public function delete(\$id);\n}");
        }

        // Eloquent Repository
        $eloquentRepo = base_path("app/Infrastructure/$domain/Eloquent/{$domain}Repository.php");
        if (!File::exists($eloquentRepo)) {
            File::put($eloquentRepo, "<?php\n\nnamespace App\Infrastructure\\$domain\Eloquent;\n\nuse App\Domains\\$domain\Repositories\\{$domain}RepositoryInterface;\nuse App\Models\\$domain as EloquentModel;\n\nclass {$domain}Repository implements {$domain}RepositoryInterface\n{\n    public function all() { return EloquentModel::all(); }\n    public function find(\$id) { return EloquentModel::find(\$id); }\n    public function create(array \$data) { return EloquentModel::create(\$data); }\n    public function update(\$id, array \$data) { return EloquentModel::find(\$id)?->update(\$data); }\n    public function delete(\$id) { return EloquentModel::find(\$id)?->delete(); }\n}");
        }

        // Controller
        $controllerFile = base_path("app/Interfaces/Http/$domain/Controllers/{$domain}Controller.php");
        if (!File::exists($controllerFile)) {
            File::put($controllerFile, "<?php\n\nnamespace App\Interfaces\Http\\$domain\Controllers;\n\nuse App\Http\Controllers\Controller;\nuse Illuminate\Http\Request;\n\nclass {$domain}Controller extends Controller\n{\n    public function index() {}\n    public function show(\$id) {}\n    public function store(Request \$request) {}\n    public function update(Request \$request, \$id) {}\n    public function destroy(\$id) {}\n}");
        }

        // Request (Store / Update)
        $requestFile = base_path("app/Interfaces/Http/$domain/Requests/{$domain}Request.php");
        if (!File::exists($requestFile)) {
            File::put($requestFile, "<?php\n\nnamespace App\Interfaces\Http\\$domain\Requests;\n\nuse Illuminate\Foundation\Http\FormRequest;\n\nclass {$domain}Request extends FormRequest\n{\n    public function authorize() { return true; }\n    public function rules() { return []; }\n}");
        }

        // Resource
        $resourceFile = base_path("app/Interfaces/Http/$domain/Resources/{$domain}Resource.php");
        if (!File::exists($resourceFile)) {
            File::put($resourceFile, "<?php\n\nnamespace App\Interfaces\Http\\$domain\Resources;\n\nuse Illuminate\Http\Resources\Json\JsonResource;\n\nclass {$domain}Resource extends JsonResource\n{\n    public function toArray(\$request) { return parent::toArray(\$request); }\n}");
        }

        $this->info("✅ Domain $domain structure and CRUD skeleton created successfully!");
    }
}
