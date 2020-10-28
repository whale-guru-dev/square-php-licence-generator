<html>
<head>
    <title>My Payment Form</title>
    <!-- link to the SqPaymentForm library -->
{{--    <script type="text/javascript" src="https://js.squareupsandbox.com/v2/paymentform">--}}
        <script type="text/javascript" src="https://js.squareup.com/v2/paymentform">
        // https://js.squareup.com/v2/paymentform
    </script>
    <script type="text/javascript">
        window.applicationId = "{{env('SQUARE_APPLICATION_ID')}}";
        window.locationId = "{{env('SQUARE_LOCATION')}}";
    </script>

    <title>Tablescrapes</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('shopifybot/img/favicon.jpg')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- link to the local SqPaymentForm initialization -->
    <script type="text/javascript" src="{{asset('assets/square/sq-payment-form.js')}}"></script>
    <!-- link to the custom styles for SqPaymentForm -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/square/sq-payment-form.css')}}">
</head>
<body>
<div class="container">
    <div class="logo text-center">
        <img src="{{asset('shopifybot/img/tablescrapes.png')}}" width="50%"/>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <h4><strong>{{$plan->name}} - You are about to make a one time payment</strong></h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="sq-payment-form">
                <!--
                  Square's JS will automatically hide these buttons if they are unsupported
                  by the current device.
                -->
                <div id="sq-walletbox">
                    <button id="sq-google-pay" class="button-google-pay"></button>
                    <button id="sq-apple-pay" class="sq-apple-pay"></button>
                    <button id="sq-masterpass" class="sq-masterpass"></button>
                    <div class="sq-wallet-divider">
                        <span class="sq-wallet-divider__text">Or</span>
                    </div>
                </div>
                <div id="sq-ccbox">
                    <!--
                      You should replace the action attribute of the form with the path of
                      the URL you want to POST the nonce to (for example, "/process-card").
                      You need to then make a "Charge" request to Square's Payments API with
                      this nonce to securely charge the customer.
                      Learn more about how to setup the server component of the payment form here:
                      https://developer.squareup.com/docs/payments-api/overview
                    -->
                    <form id="nonce-form" novalidate action="{{route('subscribe')}}" method="post">
                        @csrf
                        <input type="hidden" value="purchase" name="type">
                        <input type="hidden" value="{{$plan->id}}" name="pid">
                        <div class="sq-field">
                            <label class="sq-label">Card Number</label>
                            <div id="sq-card-number"></div>
                        </div>
                        <div class="sq-field-wrapper">
                            <div class="sq-field sq-field--in-wrapper">
                                <label class="sq-label">CVV</label>
                                <div id="sq-cvv"></div>
                            </div>
                            <div class="sq-field sq-field--in-wrapper">
                                <label class="sq-label">Expiration</label>
                                <div id="sq-expiration-date"></div>
                            </div>
                            <div class="sq-field sq-field--in-wrapper">
                                <label class="sq-label">Postal</label>
                                <div id="sq-postal-code"></div>
                            </div>
                        </div>
                        <div class="sq-field">
                            <button id="sq-creditcard" class="sq-button" onclick="onGetCardNonce(event)">
                                Pay ${{$plan->price}} Now
                            </button>
                        </div>
                        <!--
                          After a nonce is generated it will be assigned to this hidden input field.
                        -->
                        <div id="error"></div>
                        <input type="hidden" id="card-nonce" name="nonce">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Begin Payment Form -->

<!-- End Payment Form -->
</body>
</html>
