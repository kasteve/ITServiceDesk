<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Issue;

class IssuePolicy
{
    public function view(User $user, Issue $issue)
    {
        // Check if the user has the "view" permission (regular user, moderator, or admin)
        return $user->hasPermission('view');
    }

    public function create(User $user)
    {
        // Check if the user has the "create" permission (moderator or admin)
        return $user->hasPermission('create');
    }

    public function update(User $user, Issue $issue)
    {
        // Check if the user has the "update" permission (moderator or admin)
        return $user->hasPermission('update');
    }

    public function delete(User $user, Issue $issue)
    {
        // Check if the user has the "delete" permission (admin)
        return $user->hasPermission('delete');
    }
}
