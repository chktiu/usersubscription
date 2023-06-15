# Laravel Subscription Management

This project is a subscription management system built with Laravel, allowing users to subscribe to different plans and manage their recurring subscriptions using the Stripe API.

## Features

- User registration and login functionality.
- Subscription plan selection and payment using Stripe API.
- Ability to update and cancel subscriptions.
- Integration with Stripe for secure payment processing.

## Installation

1. Clone the repository to your local machine:

2. Navigate to the project directory:

3. Install the dependencies using Composer:

4. Configure the environment variables:
- Rename the `.env.example` file to `.env`.
- Update the `APP_KEY` value in the `.env` file by generating a new application key:
  
  php artisan key:generate
  
- Set your Stripe API keys in the `.env` file:
 
  STRIPE_KEY    =   your_stripe_publishable_key
  STRIPE_SECRET =    your_stripe_secret_key
  
5. Run the database migrations and seed the database:

6. Start the development server:

7. Access the application in your web browser at `http://localhost:8000`.

## Usage

- Register a new user account or log in with existing credentials.
- Browse the available subscription plans and select one.
- Provide the required payment details to complete the subscription.
- View and manage your subscriptions, including updating or canceling them.

## Contributing

Contributions are welcome! If you find any bugs or want to suggest improvements, please open an issue or submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).
