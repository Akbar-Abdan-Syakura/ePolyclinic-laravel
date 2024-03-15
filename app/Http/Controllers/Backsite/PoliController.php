<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

// use library here
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// use request here
use App\Http\Requests\Poli\UpdatePoliRequest;
use App\Http\Requests\Poli\StorePoliRequest;

// simlple use here
use Gate;
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
        abort_if(Gate::denies('poli_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // for table grid
        $poli = Poli::orderBy('created_at', 'desc')->get();

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

        // re format before push to table
        $data['price'] = str_replace(',', '', $data['price']);
        $data['price'] = str_replace('IDR ', '', $data['price']);

        // store to database
        $poli = Poli::create($data);

        alert()->success('Success Message', 'Successfully added new poli services');
        return redirect()->route('backsite.poli.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Poli $poli)
    {
        abort_if(Gate::denies('poli_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('poli_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        // re format before push to table
        $data['price'] = str_replace(',', '', $data['price']);
        $data['price'] = str_replace('IDR ', '', $data['price']);

        // update to database
        $poli->update($data);

        alert()->success('Success Message', 'Successfully updated poli services');
        return redirect()->route('backsite.poli.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poli $poli)
    {
        abort_if(Gate::denies('poli_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poli->forceDelete();

        alert()->success('Success Message', 'Successfully deleted poli services');
        return back();
    }
}
