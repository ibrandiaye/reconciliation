<?php

namespace App\Http\Controllers;

use App\Repositories\AffectationRepository;
use App\Repositories\DecaissementRepository;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    protected $affectationRepository;
    protected $projetRepository;
    protected $decaissementRepository;
    public function __construct(AffectationRepository $affectationRepository,
    ProjetRepository $projetRepository,DecaissementRepository $decaissementRepository){
        $this->affectationRepository = $affectationRepository;
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
        $affectations = $this->affectationRepository->getAll();
        return view('affectation.index',compact('affectations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = $this->projetRepository->getAll();

        return view('affectation.add',compact("projets"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $affectation = $this->affectationRepository->store($request->all());
        return redirect('affectation');
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
        $affectation = $this->affectationRepository->getById($id);
        $projets = $this->projetRepository->getAll();
        $decaissements = $this->decaissementRepository->getAll();
        return view('affectation.edit',compact('affectation','projets','decaissements'));
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
        $this->affectationRepository->update($id,$request->all());
        return redirect('affectation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->affectationRepository->destroy($id);
        redirect('affectation');
    }
}
