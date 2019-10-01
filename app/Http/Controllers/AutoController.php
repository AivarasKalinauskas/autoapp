<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Http\Requests\AutoStoreRequest;
use App\Services\AutoService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AutoController extends Controller
{

    private $autoService;

    /**
     * AutoController constructor.
     * @param $autoService
     */
    public function __construct(AutoService $autoService)
    {
        $this->autoService = $autoService;
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $paginatedAutos = $this->autoService->getPaginateData();

        return view('admin.home', [
            'autos' => $paginatedAutos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutoStoreRequest $request)
    {
        $this->autoService->insertNewCar($request->getMake(), $request->getModel());

        return redirect()->route('home.index')
            ->with('status', 'Auto inserted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function show(Auto $auto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function edit(Auto $auto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auto $auto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        //
    }
}
