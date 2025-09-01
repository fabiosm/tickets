<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model, bool $newIsAdmin): bool
    {
        // O próprio usuário não pode alterar seu próprio nível de admin
        if ($user->id === $model->id && $newIsAdmin != $model->is_admin) {
            return false;
        }

        return true;
    }
}
