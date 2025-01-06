<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:42
 */

namespace App\Repositories;


use App\Models\Bureau;
use Illuminate\Support\Facades\DB;

class BureauRepository extends RessourceRepository{

    public function __construct(Bureau $bureau){
        $this->model =$bureau;
    }

    public function getByProjet($id)
    {
        return DB::table("bureaus")
        ->where("projet_id",$id)
        ->get();
    }
}
