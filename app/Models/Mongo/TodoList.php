<?php

namespace App\Models\Mongo;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\EmbedsMany;

class TodoList extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function todos(): EmbedsMany
    {
        return $this->embedsMany(Todo::class);
    }
}
