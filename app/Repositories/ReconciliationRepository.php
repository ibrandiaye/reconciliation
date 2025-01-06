<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:42
 */

namespace App\Repositories;


use App\Models\Reconciliation;

class ReconciliationRepository extends RessourceRepository{

    public function __construct(Reconciliation $reconciliation){
        $this->model =$reconciliation;
    }
}
