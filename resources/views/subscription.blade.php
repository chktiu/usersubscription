 
@extends('layouts.app')

@section('content')
    <h1>Subscription Form</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subscribe') }}" method="POST">
        @csrf
        <div>
            <label for="plan">Choose a subscription plan:</label>
            <select name="plan" id="plan">
                @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="payment_method">Payment Method:</label>
            <div id="card-element"></div>
        </div>
        <button type="submit">Subscribe</button>
    </form>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ config('services.stripe.key') }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');
    </script>
@endsection
