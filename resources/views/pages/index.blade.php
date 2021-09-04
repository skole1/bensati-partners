@extends('layouts.master')


@section('title')
    Home | Bensati-Partners
@endsection

@section('content')
    <section class="row mt-5">
        <div class="col-md-8 mx-auto">
            <div class="card-header bg-white">
                <h3 class="font-weight-bold ">Apply For a Case</h3>
            </div>
            <div class="card-body bg-white">
                <h6 class="font-weight-bold small mb-2">Bensati-Partners</h6>
                <form action="{{ route('pay') }}" method="post" id="paymentForm">
                    @csrf
                    <div class="row">
                        @php
                            // $fname = head(explode(' ', trim($user->name)));
                            [$firstName, $lastName, $othername] = array_pad(explode(' ', trim($user->name)), 3, null);
                            
                        @endphp
                        <div class="col-md-6">
                            <input type="text" name="first_name" id="first_name" class="form-control"
                                placeholder="First Name" value="{{ $firstName }}">
                            @error('first_name')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="other_names" id="other_names" class="form-control"
                                placeholder="Other Names" value="{{ $lastName }} {{ $othername }}">
                            @error('other_names')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <input type="phone" name="phone" id="phone" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="col-md-6 mt-2">
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter Your Email" value="{{ $user->email }}">
                            @error('email')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <select name="case_name" id="case_name" class="form-control">
                                <option value="">[-- Select Cases--]</option>
                                <option>Defermation of Character</option>
                                <option>Company Case</option>
                                <option>Culpable Homicide</option>
                                <option>Raping</option>
                            </select>
                            @error('case_name')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <select name="case_amount" id="case_amount" class="form-control">
                                <option>10000</option>
                                <option>15000</option>
                                <option>20000</option>
                                <option>25000</option>
                            </select>
                            <div id="card-input"></div>
                            @error('case_amount')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <select name="payment_option" id="payment_option" class="form-control">
                                <option value="">[-- Payment Option --]</option>
                                <option>Bank Branch</option>
                                <option id="selectID">Debit Card</option>
                            </select>
                            @error('payment_option')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2">
                            <button type="submit" class="btn btn-danger btn-block" onclick="payWithPaystack()">Pay</button>
                        </div>
                    </div>
                </form>
                <img src="{{ asset('img/Remita.png') }}" alt="Remita Picture" style="width: 100%;">
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#payment_option').on('change', function(e) {
                if (e.target.value === 'Debit Card') {
                    $('#case_amount').hide();
                    var card = $(
                        '<input type="text" class="form-control" name="case_amount" id="card" placeholder="Enter Amount">'
                    );
                    $('#card-input').append(card);
                } else if (e.target.value === 'Bank Branch') {
                    $('#case_amount').show();
                    $('#card').remove();
                }

            });
        });
    </script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: 'pk_test_935c5a0ba56fc9c1bfcfeb6a0142f25ca6cde783', // Replace with your public key
                first_name: $('#first_name').val(),
                other_names: $('#other_names').val(),
                phone: $('#phone').val(),
                email: $('#email').val(),
                case_name: document.getElementById("case_name").value,
                amount: document.getElementById("case_amount").value * 100,
                case_amount: document.getElementById("payment_option").value,
                case_amount: document.getElementById("trans_id").value,
                case_amount: document.getElementById("ref_id").value,
                currency: "NGN",
                ref: 'BS' + Math.floor((Math.random() * 1000000000) +
                    1
                ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function() {
                    window.location = "http://127.0.0.1:8000?trasaction=cancelled";
                    alert('Trasaction Cancelled.');
                },
                callback: function(response) {
                    let message = 'Payment complete! Reference: ' + response.reference;
                    alert(message);
                    window.location =
                        "http://127.0.0.1:8000?paystack2/varify_transaction?reference=" +
                        response
                        .reference;
                }
            });
            handler.openIframe();
        }
    </script>
@endsection
