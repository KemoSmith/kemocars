<?php

namespace App\Policies;

use App\ContactInfo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactInfoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\ContactInfo  $contactInfo
     * @return mixed
     */
    public function view(User $user, ContactInfo $contactInfo)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return !!auth()->user();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\ContactInfo  $contactInfo
     * @return mixed
     */
    public function update(User $user, ContactInfo $contactInfo)
    {
        return $user->id = $contactInfo->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ContactInfo  $contactInfo
     * @return mixed
     */
    public function delete(User $user, ContactInfo $contactInfo)
    {
        return $user->id = $contactInfo->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\ContactInfo  $contactInfo
     * @return mixed
     */
    public function restore(User $user, ContactInfo $contactInfo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ContactInfo  $contactInfo
     * @return mixed
     */
    public function forceDelete(User $user, ContactInfo $contactInfo)
    {
        //
    }
}
