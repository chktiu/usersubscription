<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Plan;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function createCustomer($name, $email)
    {
        return Customer::create([
            'name' => $name,
            'email' => $email,
        ]);
    }

    public function createSubscription($customerId, $planId)
    {
        return Subscription::create([
            'customer' => $customerId,
            'items' => [
                ['plan' => $planId],
            ],
        ]);
    }

    public function cancelSubscription($subscriptionId)
    {
        $subscription = Subscription::retrieve($subscriptionId);
        return $subscription->cancel();
    }

    public function getPlan($planId)
    {
        return Plan::retrieve($planId);
    }
}
