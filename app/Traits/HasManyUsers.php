<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\HasMany;


trait HasManyUsers
{
    use HasRelationships;

    // agar bisa digunakan kembali ke Model lain
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

}

