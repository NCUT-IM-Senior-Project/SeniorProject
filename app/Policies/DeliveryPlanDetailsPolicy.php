<?php

namespace App\Policies;

use App\Models\DeliveryPlanDetails;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DeliveryPlanDetailsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DeliveryPlanDetails $deliveryPlanDetails): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DeliveryPlanDetails $deliveryPlanDetails): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DeliveryPlanDetails $deliveryPlanDetails): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DeliveryPlanDetails $deliveryPlanDetails): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DeliveryPlanDetails $deliveryPlanDetails): bool
    {
        //
    }
}
