@extends('layouts.master')


@section('title')
    Confirm Invoice | Bensati-Partners
@endsection

@section('content')
    <section class="row mt-5">
        <div class="col-md-10 mx-auto">
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <th>
                            <h5 class="float-left"> <strong>Payment Confirmation</strong></h5>
                        </th>
                        <th><a href="{{ url('generate/' . $payments->id) }}" class="btn btn-danger float-right">Generate
                                Invoice</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong>Application ID</strong>
                        </td>
                        <td>{{ $payments->application_id }}</td>
                    </tr>
                    <tr>
                        <td> <strong>Surname</strong></td>
                        <td>{{ $payments->first_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Other Name</strong></td>
                        <td>{{ $payments->other_names }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone Number</strong></td>
                        <td>{{ $payments->phone }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{ $payments->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Payment Option</strong></td>
                        <td>{{ $payments->payment_option }}</td>
                    </tr>
                    <tr>
                        <td><strong>Case Type</strong></td>
                        <td>{{ $payments->case_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Amount Paid</strong></td>
                        <td>{{ $payments->case_amount }}</td>
                    </tr>

                </tbody>
            </table>
            <div class="alert alert-danger">
                <h6> <strong>Note:</strong> Your Application ID is very Important keep it safe</h6>
            </div>
            <div class="alert alert-success">
                <h6>Your Application ID: <strong>{{ $payments->application_id }}</strong></h6>
            </div>
        </div>

    </section>
@endsection
