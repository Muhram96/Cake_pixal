<!-- payment.blade.php -->

<form action="{{ route('payment.process') }}" method="post">
    @csrf
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{ env('STRIPE_KEY') }}"
        data-amount="999"
        data-name="Your Company Name"
        data-description="Product or Service Description"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto"
        data-currency="usd">
    </script>
</form>
