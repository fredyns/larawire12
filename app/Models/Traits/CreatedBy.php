<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property User $createdBy
 */
trait CreatedBy
{
    /**
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<TRelatedModel, $this>
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'id', 'created_by');
    }
}
