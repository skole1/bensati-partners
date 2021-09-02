<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Generate PDF Reports</title>
</head>

<body>
    <div class="row">
        <div class="col-md-2 mx-auto">
            <img src="{{ asset('img/ben.jpg') }}" alt="" style="max-width: 170px;" class="mt-4" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="text-center">
                <h3><strong>BENJAMIN SATI & PARTNERS</strong></h3>
            </div>
            <hr>
        </div>
    </div>
    <hr class="mt-2">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="text-center">
                <h3><strong>PAYMENT INVOICE (THIS IS NOT A RECIEPT)</strong></h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th colspan="2" class="h4"><strong>PAYER'S INFORMATION</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <strong>APPLICATION ID:</strong></td>
                        <td>{{ $payments->application_id }}</td>
                    </tr>
                    <tr>
                        <td> <strong>NAME:</strong></td>
                        <td>{{ $payments->first_name }} {{ $payments->other_names }}</td>
                    </tr>
                    <tr>
                        <td> <strong>PHONE NO:</strong></td>
                        <td>{{ $payments->phone }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{ $payments->email }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered table-striped mt-5">
                <thead>
                    <tr>
                        <th colspan="2" class="h4"><strong>INVOICE DETAILS</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>BIENG PAYMENT FOR:</strong></td>
                        <td>{{ $payments->case_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>CASE NAME:</strong></td>
                        <td>{{ $payments->case_name }}</td>
                    </tr>
                    <tr>
                        <td> <strong>DATE GENERATED:</strong></td>
                        <td>{{ $payments->created_at->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td> <strong>CASE FEE:</strong></td>
                        <td>{{ number_format($payments->case_amount, 0) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto mb-5">
            <div class="text-right">
                <h6>Powered by <b>IDEAS TECH SOLUTIONS LTD.</b></h6>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
