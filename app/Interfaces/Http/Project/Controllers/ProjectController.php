<?php

namespace App\Interfaces\Http\Project\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {}
    public function show($id) {}
    public function store(Request $request) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}