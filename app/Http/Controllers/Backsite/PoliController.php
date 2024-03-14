<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use request here
use App\Http\Requests\Poli\UpdatePoliRequest;
use App\Http\Requests\Poli\StorePoliRequest;

// simlple use here
// use Gate;
use Auth;

// model here
use App\Models\MasterData\Poli;

// thirdparty package

class PoliController extends Controller
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
        $poli = Poli::orderBy('create_at', 'desc')->get();

        return view('pages.backsite.master-data.poli.index', compact('poli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePoliRequest $request)
    {
        // get all data from frontsite
        $data = $request->all();

        // store to database
        $poli = Poli::create($data);

        alert()->success('Success Message', 'Successfully added new poli services');
        return redirect()->route('backsite.poli-services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Poli $poli)
    {
        return view('pages.backsite.master-data.poli.show', compact('poli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Poli $poli)
    {
        return view('pages.backsite.master-data.poli.edit', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePoliRequest $request, Poli $poli)
    {
        // get all data request from frontsite
        $data = $request->all();

        // update to database
        $poli->update($data);

        alert()->success('Success Message', 'Successfully updated poli services');
        return redirect()->route('backsite.poli-services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poli $poli)
    {
        $poli->delete();

        alert()->success('Success Message', 'Successfully deleted poli services');
        return back();
    }
}
