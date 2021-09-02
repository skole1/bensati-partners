if (Payment::where('id', $id)->exists()) {
    $payments = Payment::find($id);
    // return view('pages.generate', compact('payments'));
    $data = [
        'payments' => $payments,
    ];

    $pdf = PDF::loadView('pages.generate', $data);
    return $pdf->stream();
    return $pdf->download('invoice.pdf');
} else {
    return redirect()
        ->back()
        ->with('status', 'No Payments found');
}