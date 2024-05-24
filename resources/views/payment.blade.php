<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Plan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <style>
        #payment-form {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            @foreach ($plans as $plan)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plan['name'] }}</h5>
                            <p class="card-text">Price: ${{ $plan['price'] / 100 }}/month</p>
                            <button class="btn btn-primary btn-block select-plan" 
                                    data-plan="{{ $plan['name'] }}" 
                                    data-amount="{{ $plan['price'] }}">Select Plan</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="payment-form" class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Payment Details</h2>
                <p>Selected Plan: <span id="selected-plan"></span></p>
                <p>Price: $<span id="plan-price"></span>/month</p>
                <form action="{{ route('payment.process') }}" method="post" id="stripe-form">
                    @csrf
                    <input type="hidden" name="plan" id="plan-input">
                    <input type="hidden" name="amount" id="amount-input">
                    <button type="button" class="btn btn-success btn-block" id="pay-button">Pay with Card</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.select-plan').forEach(card => {
            card.addEventListener('click', function() {
                const plan = this.dataset.plan;
                const amount = this.dataset.amount;

                // Update payment form with selected plan and price
                document.getElementById('selected-plan').textContent = plan;
                document.getElementById('plan-price').textContent = (amount / 100).toFixed(2);
                document.getElementById('plan-input').value = plan;
                document.getElementById('amount-input').value = amount;

                // Show payment form
                document.getElementById('payment-form').style.display = 'block';
            });
        });

        document.getElementById('pay-button').addEventListener('click', function(e) {
            e.preventDefault();

            const stripeHandler = StripeCheckout.configure({
                key: '{{ env('STRIPE_KEY') }}',
                locale: 'auto',
                token: function(token) {
                    const form = document.getElementById('stripe-form');
                    const hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });

            stripeHandler.open({
                name: 'Your Company Name',
                description: document.getElementById('selected-plan').textContent,
                amount: document.getElementById('amount-input').value,
                currency: 'usd',
                image: 'https://stripe.com/img/documentation/checkout/marketplace.png'
            });
        });
    </script>
</body>
</html>
