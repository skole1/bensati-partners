<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ensures optimal rendering on mobile devices. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <form onsubmit="makePayment()" id="payment-form">
        <ul class="form-style-1">
            <li>
                <label>Full Name <span class="required">*</span></label>
                <input type="text" id="js-firstName" name="firstName" class="field-divided form-control"
                    placeholder="First" />&nbsp;

                <input type="text" id="js-lastName" name="lastName" class="field-divided form-control"
                    placeholder="Last" />
            </li>
            <li>
                <label>Email <span class="required">*</span></label>
                <input type="email" id="js-email" name="email" class="field-long form-control" />
            </li>
            <li>
                <label>Narration <span class="required">*</span></label>
                <input type="text" id="js-narration" name="narration" class="field-long form-control" />
            </li>
            <li>
                <label>Amount <span class="required">*</span></label>
                <input type="number" id="js-amount" name="amount" class="field-long form-control" />
            </li>
            <li>
                <input type="button" class="btn btn-primary mt-2" onclick="makePayment()" value="Pay" />
            </li>
        </ul>
    </form>
    <script type="text/javascript" src="https://login.remita.net/payment/v1/remita-pay-inline.bundle.js"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
