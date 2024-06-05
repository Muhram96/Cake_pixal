<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Plan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <link href="{{ asset('resources\css\pricing.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <style>
        #payment-form {
            display: none;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="main">
                <table class="price-table">
                    <tbody>
                    <tr>
                        <td class="price-blank"></td>
                        <td class="price-blank"></td>
                        <td class="price-table-popular">Most popular</td>
                        <td class="price-blank"></td>
                    </tr>
                    <tr class="price-table-head">
                        <td></td>
                        <td>
                            Basic Plan
                            <br><small style="font-size: 12px; font-weight: 400;">Basic Plan</small>
                        </td>
                        <td>
                            Standard Plan
                            <br><small style="font-size: 12px; font-weight: 400;">Longer data retention</small>
                        </td>
                        <td class="green-width">
                            Premium Plan
                            <br><small style="font-size: 12px; font-weight: 400;">Our complete solution</small>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="price">
                            <i class="fa-solid fa-file-zipper"></i>
                            <br>$9.99/month
                        </td>
                        <td class="price">
                            <i class="fa-solid fa-photo-film"></i>
                            <br>&euro;$19.99/month
                        </td>
                        <td class="price">
                            <i class="fa-solid fa-business-time"></i>
                            <br>&euro;$29.99/month
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Background Removal</td>
                        <td>1</td>
                        <td>10</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <td><a href="#wordpress-core-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Image Enhancement</td>
                        <td>10 images</td>
                        <td>50 images</td>
                        <td>500/mo</td>
                    </tr>
                    <tr>
                        <td><a href="#wordpress-security-monitoring" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Object Removal</td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td><a href="#wordpress-uptime-monitoring" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Photo Colorization</td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td><a href="#wordpress-malware-cleanup" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Image Compression</td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td><a href="#wordpress-security-audit" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Identity Photo</td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td><a href="#wordpress-security-audit" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Photo Crop API</td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td><a href="#wordpress-priority-support" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> 24/7 Support</td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="price">
                            <!-- Basic Plan Button -->
                            <button type="button" class="btn btn-danger select-plan" data-toggle="modal" data-target="#basic_plan" data-plan="Basic Plan" data-amount="999">
                                Select Plan
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="basic_plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Payment Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Selected Plan: <span id="selected-plan"></span></p>
                                            <p>Price: $<span id="plan-price"></span>/month</p>
                                            <form action="{{ route('payment.process') }}" method="post" id="stripe-form">
                                                @csrf
                                                <input type="hidden" name="plan" id="plan-input">
                                                <input type="hidden" name="amount" id="amount-input">
                                                <button type="button" class="btn btn-success btn-block" id="pay-button">Pay with Card</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="price">
                            <!-- Standard Plan Button -->
                            <button type="button" class="btn btn-danger select-plan" data-toggle="modal" data-target="#standard_plan" data-plan="Standard Plan" data-amount="999">
                                Select Plan
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="standard_plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Payment Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Selected Plan: <span id="selected-plan"></span></p>
                                            <p>Price: $<span id="plan-price"></span>/month</p>
                                            <form action="{{ route('payment.process') }}" method="post" id="stripe-form">
                                                @csrf
                                                <input type="hidden" name="plan" id="plan-input">
                                                <input type="hidden" name="amount" id="amount-input">
                                                <button type="button" class="btn btn-success btn-block" id="pay-button">Pay with Card</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="price">
                            <!-- Premium Plan Button -->
                            <button type="button" class="btn btn-danger select-plan" data-toggle="modal" data-target="#premium_plan" data-plan="Premium Plan" data-amount="2999">
                                Select Plan
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="premium_plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Payment Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Selected Plan: <span id="selected-plan"></span></p>
                                            <p>Price: $<span id="plan-price"></span>/month</p>
                                            <form action="{{ route('payment.process') }}" method="post" id="stripe-form">
                                                @csrf
                                                <input type="hidden" name="plan" id="plan-input">
                                                <input type="hidden" name="amount" id="amount-input">
                                                <button type="button" class="btn btn-success btn-block" id="pay-button">Pay with Card</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
{{--<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.select-plan').forEach(button => {
            button.addEventListener('click', function () {
                const plan = this.getAttribute('data-plan');
                const amount = this.getAttribute('data-amount');

                // Update modal content
                document.getElementById('selected-plan').textContent = plan;
                document.getElementById('plan-price').textContent = (amount / 100).toFixed(2);
                document.getElementById('plan-input').value = plan;
                document.getElementById('amount-input').value = amount;
            });
        });

        document.getElementById('pay-button').addEventListener('click', function (e) {
            e.preventDefault();
            const stripeHandler = StripeCheckout.configure({
                key: 'pk_test_51P18o5D7VDcQ5LWGHa1Tvmu755UouKGFndbuaXc0FQw2e1hFLrCLaR0ORYkpsjTBW1szZMxk0jZAHdoerYvEm77d00HUJiIf6c',
                locale: 'auto',
                token: function (token) {
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
    });
</script>--}}

</body>
</html>
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
            key: 'pk_test_51P18o5D7VDcQ5LWGHa1Tvmu755UouKGFndbuaXc0FQw2e1hFLrCLaR0ORYkpsjTBW1szZMxk0jZAHdoerYvEm77d00HUJiIf6c',
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
