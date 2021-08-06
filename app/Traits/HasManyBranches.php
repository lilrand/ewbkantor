<?php

namespace App\Traits;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\HasMany;


trait HasManyBranches
{
    use HasRelationships;

    // agar bisa digunakan kembali ke Model lain
    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

}
