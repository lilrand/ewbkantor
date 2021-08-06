<?php

namespace App\Traits;

use App\Models\Division;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



trait BelongsToDivision
{
    use HasRelationships;

    // agar bisa digunakan kembali ke Model lain
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

}
