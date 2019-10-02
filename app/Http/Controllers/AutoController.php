<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Http\Requests\AutoStoreRequest;
use App\Services\AutoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * @return Response
     */
    public function create()
    {
        return view('admin.auto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(AutoStoreRequest $request)
    {
        $this->autoService->insertNewCar(
            $request->getMake(),
            $request->getModel(),
            $request->getPhoto()
            );

        return redirect()->route('home.index')
            ->with('status', 'Auto inserted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $auto = $this->autoService->getById($id);

        return view('admin.auto.show', [
            'auto' => $auto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auto  $auto
     * @return Response
     */
    public function edit($id)
    {
        $auto = $this->autoService->getById($id);

        return view('admin.auto.edit', [
            'auto' => $auto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AutoStoreRequest $request
     * @param $id
     * @return void
     */
    public function update(AutoStoreRequest $request, $id)
    {
        $this->autoService->updateById(
            $id,
            $request->getMake(),
            $request->getModel(),
            $request->getPhoto()
        );

        return redirect()->route('home.index')
            ->with('status', 'Auto updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->autoService->destroyById($id);

        return redirect()->route('home.index')->with('status', 'Auto deleted!');
    }
}
