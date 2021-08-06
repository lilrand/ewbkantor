<?php

namespace App\Traits;

use App\Models\FundApplication;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\HasMany;


trait HasManyFundApplications
{
    use HasRelationships;

    // agar bisa digunakan kembali ke Model lain
    public function fundApplication(): HasMany
    {
        return $this->hasMany(FundApplication::class);
    }

}
