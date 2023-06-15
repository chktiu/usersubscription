<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\PaymentMethod;

class SubscriptionController extends Controller
{
    public function showSubscriptionForm()
    {

        
         // Retrieve the available subscription plans from Stripe
        $plans = Stripe::plans()->all();
 
        return view('subscription', compact('plans'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'plan' => 'required',
            'payment_method' => 'required',
        ]);

        try {
            // Set the Stripe API key
            Stripe::setApiKey(config('services.stripe.secret'));

            // Create a new customer in Stripe
            $customer = Customer::create([
                'email' => $request->user()->email,
                'payment_method' => $request->payment_method,
                'invoice_settings' => [
                    'default_payment_method' => $request->payment_method,
                ],
            ]);

            // Create a subscription for the customer
            $subscription = Subscription::create([
                'customer' => $customer->id,
                'items' => [
                    [
                        'plan' => $request->plan,
                    ],
                ],
            ]);

            // Retrieve the plan details for display
            $plan = Stripe::plans()->retrieve($request->plan);

            return view('subscription-success', compact('subscription', 'plan'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function subscriptionSuccess()
    {
        return view('subscription-success');
    }

    public function subscriptionCancel(Request $request)
    {
        try {
            // Set the Stripe API key
            Stripe::setApiKey(config('services.stripe.secret'));

            // Retrieve the customer from Stripe
            $customer = Customer::retrieve($request->user()->stripe_customer_id);

            // Cancel the subscription
            $subscription = Subscription::retrieve($customer->subscriptions->data[0]->id);
            $subscription->cancel();

            return view('subscription-cancel');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
