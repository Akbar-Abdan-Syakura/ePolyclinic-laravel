<?php

namespace App\Http\Controllers\Backsite;


// use library here
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

// use everything here
use Auth;
use Gate;


// use model here
use App\Models\User;
use App\Models\MasterData\Poli;
use App\Models\MasterData\ConfigPayment;
use App\Models\MasterData\Consultation;
use App\Models\Operational\Appointment;
use App\Models\Operational\Transaction;
use App\Models\Operational\Doctor;

class ClinicPatientController extends Controller
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
        abort_if(Gate::denies('clinic_patient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinic_patient = User::whereHas('detail_user', function (Builder $query) {
            return $query->where('type_user_id', 3); // only load user type patient or id 3 in type-user table
        })->orderBy('created_at', 'desc')->get();

        return view('pages.backsite.operational.clinic-patient.index', compact('clinic_patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
