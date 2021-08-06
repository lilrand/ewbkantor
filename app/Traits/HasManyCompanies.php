<?php

namespace App\Traits;

use App\Models\Company;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\HasMany;


trait HasManyCompanies
{
    use HasRelationships;

    // agar bisa digunakan kembali ke Model lain
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }

}
