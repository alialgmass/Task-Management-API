<?php

namespace App\Infrastructure\Project\Models;

use Illuminate\Database\Eloquent\Model;

class EloquentProject extends Model
{
    protected $table = 'projects';

    protected $fillable = ['name', 'description'];
}
