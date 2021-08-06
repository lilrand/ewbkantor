<?php

namespace App\Traits;

use App\Models\Level;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



trait BelongsToLevel
{
    use HasRelationships;

    // agar bisa digunakan kembali ke Model lain
    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

}
