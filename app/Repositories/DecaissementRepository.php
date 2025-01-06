<?php


namespace App\Repositories;


use App\Models\Decaissement;
use Illuminate\Support\Facades\DB;

class DecaissementRepository extends RessourceRepository{

    public function __construct(Decaissement $decaissement){
        $this->model =$decaissement;
    }
    public function getByProjet($id)
    {
        return DB::table("decaissements")
        ->where("projet_id",$id)
        ->get();
    }
}
