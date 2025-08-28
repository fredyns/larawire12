<?php

namespace App\Policies\Sample;

use App\Models\Sample\SampleRecord;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SampleRecordPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the record can view any models.
     */
    public function index(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the record can view the model.
     */
    public function view(User $user, SampleRecord $model): bool
    {
        return true;
    }

    /**
     * Determine whether the record can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the record can update the model.
     */
    public function update(User $user, SampleRecord $model): bool
    {
        return true;
    }

    /**
     * Determine whether the record can delete the model.
     */
    public function delete(User $user, SampleRecord $model): bool
    {
        return true;
    }

    /**
     * Determine whether the record can restore the model.
     */
    public function restore(User $user, SampleRecord $model): bool
    {
        return false;
    }
}
