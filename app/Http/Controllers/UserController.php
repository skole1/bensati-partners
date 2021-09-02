<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function index()
    {
        $user = Auth::user();
        return view('pages.index', [
            'user' => $user,
        ]);
    }
    public function login()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function payment()
    {
        return view('pages.remita');
    }

    public function invoice($payment_id)
    {
        if (Payment::where('id', $payment_id)->exists()) {
            $payments = Payment::find($payment_id);
            return view('pages.confirm_invoice', ['payments' => $payments]);
        }
    }

    public function postPayment(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'other_names' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'case_name' => 'required',
            'case_amount' => 'required',
            'payment_option' => 'required',
        ]);

        // [$firstName, $lastName, $othername] = array_pad(
        //     explode(' ', trim(Auth::user()->name)),
        //     3,
        //     null
        // );

        $payments = Payment::create([
            'application_id' => 'BENSAT-' . mt_rand(10000, 99999),
            'first_name' => $request->first_name,
            'other_names' => $request->other_names,
            'phone' => $request->phone,
            'email' => $request->email,
            'case_name' => $request->case_name,
            'case_amount' => $request->case_amount,
            'payment_option' => $request->payment_option,
        ]);
        return redirect('/confirm_invoice/' . $payments->id)->with(
            'success',
            'Payment was successfully made!'
        );
    }

    public function generate($payment_id)
    {
        if (Payment::where('id', $payment_id)->exists()) {
            $payments = Payment::find($payment_id);

            $data = [
                'payments' => $payments,
            ];

            $pdf = PDF::loadView('pages.generate', $data);
            return $pdf->download('invoice.pdf');
        } else {
            return redirect()
                ->back()
                ->with('status', 'No Payments found');
        }
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('index');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('index');
    }
}
