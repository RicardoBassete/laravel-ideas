<?php

namespace App\Policies;

use App\Models\User;
use App\Models\idea;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
	/**
	 * Determine whether the user can update the model.
	 */
	public function update(User $user, idea $idea): bool
	{
		// edit / update
		return $user->canEditIdea($idea);
	}

	/**
	 * Determine whether the user can delete the model.
	 */
	public function delete(User $user, idea $idea): bool
	{
		return $user->canEditIdea($idea);
	}
}
