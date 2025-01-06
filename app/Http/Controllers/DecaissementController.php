<?php

namespace App\Http\Controllers;

use App\Repositories\DecaissementRepository;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;

class DecaissementController extends Controller
{
    protected $decaissementRepository;
    protected $projetRepository;
    public function __construct(DecaissementRepository $decaissementRepository,
    ProjetRepository $projetRepository){
        $this->decaissementRepository = $decaissementRepository;
        $this->projetRepository = $projetRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $decaissements = $this->decaissementRepository->getPaginate(20);
        $links = $decaissements->render();
        return view('decaissement.index',compact('decaissements','links'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = $this->projetRepository->getAll();
        return view('decaissement.add',compact("projets"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $decaissement = $this->decaissementRepository->store($request->all());
        return redirect('decaissement');
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
        $decaissement = $this->decaissementRepository->getById($id);
        $projets = $this->projetRepository->getAll();
        return view('decaissement.edit',compact('decaissement','projets'));
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
       // $user = Auth::user();
        //$request->merge(['commune_id'=> $user->commune_id]);
        $this->decaissementRepository->update($id,$request->all());
        return redirect('decaissement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->decaissementRepository->destroy($id);
        redirect('decaissement');
    }

    public function getByProjet($id)
    {
        $decaissements = $this->decaissementRepository->getByProjet($id);
        return response()->json($decaissements);
    }
}
