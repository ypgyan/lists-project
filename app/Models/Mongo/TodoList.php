<?php

namespace App\Models\Mongo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $guarded = [];
}
