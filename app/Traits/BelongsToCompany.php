<?php

namespace App\Traits;

use App\Models\Company;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



trait BelongsToCompany
{
    use HasRelationships;

    // agar bisa digunakan kembali ke Model lain
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
