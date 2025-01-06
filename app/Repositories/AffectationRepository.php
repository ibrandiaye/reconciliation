<?php


namespace App\Repositories;


use App\Models\Affectation;
use Illuminate\Support\Facades\DB;

class AffectationRepository extends RessourceRepository{

    public function __construct(Affectation $affectation){
        $this->model =$affectation;
    }
    public function getByProjet($id)
    {
        return DB::table("decaissements")
        ->where("projet_id",$id)
        ->get();
    }
}
