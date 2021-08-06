<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



trait BelongsToUser
{
    use HasRelationships;

    // agar bisa digunakan kembali ke Model lain
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
