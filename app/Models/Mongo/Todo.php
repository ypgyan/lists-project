<?php

namespace App\Models\Mongo;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo as BelongsToMongo;

class Todo extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $guarded = [];

    public function user(): BelongsTo|BelongsToMongo
    {
        return $this->belongsTo(User::class);
    }
}
