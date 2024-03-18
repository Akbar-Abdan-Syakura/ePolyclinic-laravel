<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;

// use library here
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

// simlple use here
// use Gate;
use Auth;

// model here
use App\Models\User;
use App\Models\Operational\Doctor;
use App\Models\Operational\Appointment;
use App\Models\Operational\Transaction;
use App\Models\MasterData\Consultation;
use App\Models\MasterData\Poli;
use App\Models\MasterData\ConfigPayment;

// thirdparty package


class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // set random code for transaction code
        $data['transaction_code'] = Str::upper(Str::random(8) . '-' . date('Ymd'));

        $appointment = Appointment::where('id', $data['appointment_id'])->first();
        $config_payment = ConfigPayment::first();

        // set transaction
        $poli_fee = $appointment->doctor->poli->price;
        $doctor_fee = $appointment->doctor->fee;
        $clinic_fee = $config_payment->fee;
        $clinic_ppn = $config_payment->ppn;

        // total
        $total = $poli_fee + $doctor_fee + $clinic_fee;

        // total with ppn and grand total
        $total_with_ppn = ($total * $clinic_ppn) / 100;
        $grand_total = $total + $total_with_ppn;

        // save to database
        $transaction = new Transaction;
        $transaction->appointment_id = $appointment['id'];
        $transaction->transaction_code = $data['transaction_code'];
        $transaction->fee_doctor = $doctor_fee;
        $transaction->fee_poli = $poli_fee;
        $transaction->fee_clinic = $clinic_fee;
        $transaction->sub_total = $total;
        $transaction->ppn = $total_with_ppn;
        $transaction->total = $grand_total;
        $transaction->save();

        // update status appointment
        $appointment = Appointment::find($appointment->id);
        $appointment->status = 1; // set to completed payment
        $appointment->save();

        return redirect()->route('payment.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }

    //custom function
    public function payment($id)
    {
        $appointment = Appointment::where('id', $id)->first();
        $config_payment = ConfigPayment::first();

        // set value
        $poli_fee = $appointment->doctor->poli->price;
        $doctor_fee = $appointment->doctor->fee;
        $clinic_fee = $config_payment->fee;
        $clinic_ppn = $config_payment->ppn;

        $total = $poli_fee + $doctor_fee + $clinic_fee;

        $total_with_ppn = ($total * $clinic_ppn) / 100;
        $grand_total = $total + $total_with_ppn;

        return view('pages.frontsite.payment.index', compact('appointment', 'config_payment', 'total_with_ppn', 'grand_total', 'id'));
    }

    public function success()
    {
        return view('pages.frontsite.success.payment-success');
    }
}
