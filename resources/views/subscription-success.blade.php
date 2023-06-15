<!-- resources/views/subscription-success.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Subscription Successful!</h1>

    <p>Thank you for subscribing to the {{ $plan->name }} plan.</p>

    <p>Subscription ID: {{ $subscription->id }}</p>
    <p>Next Billing Date: {{ $subscription->next_billing_date }}</p>
@endsection
