<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property User $updatedBy
 *
 */
trait UpdatedBy
{
    /**
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<TRelatedModel, $this>
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'id', 'updated_by');
    }
}
