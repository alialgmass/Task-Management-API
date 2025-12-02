<?php

namespace App\Interfaces\Http\Project\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize() { return true; }
    public function rules() { return []; }
}