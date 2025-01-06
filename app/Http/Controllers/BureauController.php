<?php

namespace App\Http\Controllers;

use App\Repositories\BureauRepository;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;

class BureauController extends Controller
{
    protected $bureauRepository;
    protected $projetRepository;
    public function __construct(BureauRepository $bureauRepository,
    ProjetRepository $projetRepository){
        $this->bureauRepository = $bureauRepository;
        $this->projetRepository = $projetRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bureaus = $this->bureauRepository->getPaginate(20);
        $links = $bureaus->render();
        return view('bureau.index',compact('bureaus','links'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = $this->projetRepository->getAll();
        return view('bureau.add',compact("projets"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $bureau = $this->bureauRepository->store($request->all());
        return redirect('bureau');
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
        $bureau = $this->bureauRepository->getById($id);
        $projets = $this->projetRepository->getAll();
        return view('bureau.edit',compact('bureau','projets'));
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
        $this->bureauRepository->update($id,$request->all());
        return redirect('bureau');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bureauRepository->destroy($id);
        redirect('bureau');
    }
    public function getByProjet($id)
    {
        $bureaus = $this->bureauRepository->getByProjet($id);
        return response()->json($bureaus);
    }
}
