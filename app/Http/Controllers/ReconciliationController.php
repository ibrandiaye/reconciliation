<?php

namespace App\Http\Controllers;

use App\Repositories\DecaissementRepository;
use App\Repositories\ProjetRepository;
use App\Repositories\ReconciliationRepository;
use Illuminate\Http\Request;

class ReconciliationController extends Controller
{
    protected $reconciliationRepository;
    protected $projetRepository;
    protected $decaissementRepository;
    public function __construct(ReconciliationRepository $reconciliationRepository,
    ProjetRepository $projetRepository,DecaissementRepository $decaissementRepository){
        $this->reconciliationRepository = $reconciliationRepository;
        $this->projetRepository = $projetRepository;
        $this->decaissementRepository  = $decaissementRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reconciliations = $this->reconciliationRepository->getAll();
        return view('reconciliation.index',compact('reconciliations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = $this->projetRepository->getAll();

        return view('reconciliation.add',compact("projets"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reconciliation = $this->reconciliationRepository->store($request->all());
        return redirect('reconciliation');
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
        $reconciliation = $this->reconciliationRepository->getById($id);
        $projets = $this->projetRepository->getAll();
        $decaissements = $this->decaissementRepository->getAll();
        return view('reconciliation.edit',compact('reconciliation','projets','decaissements'));
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
        $this->reconciliationRepository->update($id,$request->all());
        return redirect('reconciliation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->reconciliationRepository->destroy($id);
        redirect('reconciliation');
    }
}
