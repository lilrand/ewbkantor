<?php

namespace App\Traits;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



trait BelongsToBranch
{
    use HasRelationships;

    // agar bisa digunakan kembali ke Model lain
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

}
