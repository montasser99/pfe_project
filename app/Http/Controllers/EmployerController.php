<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Cconge;
use App\Models\Conge;
use App\Models\JoursFeries;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role=="user"){
        /**Trouver les nombre de jours travaille cette années **/

        //date now
        $dateNow = Carbon::now()->format('Y-m-d');
        //id de user connecte now
        $id_user = Auth::user()->personnel_id;

        /**start of this years**/
        $Thisyear = Carbon::now()->format('Y');

        $nombreJoursABS = 0;
        $from = date("$Thisyear-01-01");
        $to =date("$Thisyear-12-31");
        /**pour prendre touts les absence de cette années **/
        $NombreAbsence=0;
        $absence = Absence::where('ABS_NUMORD_93', $id_user)->whereBetween('ABS_DATE_DEB', [$from, $to])->get();
        //dd($absence);
       foreach ($absence as $key => $abs) {
                $start_time = Carbon::parse($abs->ABS_DATE_DEB);
                $finish_time = Carbon::parse($abs->ABS_DATE_FIN);
                $result = $start_time->diffInDays($finish_time, false);
                $nombreJoursABS = $nombreJoursABS + $result;
                $NombreAbsence=$NombreAbsence+$result;
        }
        //dd($nombreJoursABS);

        $NombreConge=0;
        $conges = Conge::where('CONG_NUMORD_93', $id_user)->whereBetween('CONG_DATE_DEB', [$from, $to])->get();
        foreach ($conges as $key => $conge) {
                $start_time = Carbon::parse($conge->CONG_DATE_DEB);
                $finish_time = Carbon::parse($conge->CONG_DATE_FIN);
                $result = $start_time->diffInDays($finish_time, false);
                $nombreJoursABS = $nombreJoursABS + $result;
                $NombreConge=$NombreConge+$result;
        }
        //dd($nombreJoursABS);
        //$nombreJoursABS ==> contient tous les nombres de jours en absence et en conges

        //**Nombre de jours max a travaille j'usqua date now**/
        $start_time = Carbon::parse($from);
        $finish_time = Carbon::parse($dateNow);
        $NombredeJoursTous = $start_time->diffInDays($finish_time, false);
        //dd($NombredeJoursTous);
        $NombreDeJoursTrav = $NombredeJoursTous - $nombreJoursABS;
        //dd($NombreDeJoursTrav.'/'.$NombredeJoursTous);


        /****Nombre de demandes acceptes et refusés ****/
        $DemandeAccepter = DB::select("SELECT count(statu) as Statu FROM `demande_conges` WHERE statu='Accepter' AND personnel_id='$id_user' ");
        $Accepter=$DemandeAccepter[0]->Statu;
        //dd($Accepter);

        $DemandeRefuser = DB::select("SELECT count(statu) as Statu FROM `demande_conges` WHERE statu='Refuser' AND personnel_id='$id_user' ");
        $Refuser=$DemandeRefuser[0]->Statu;

        /**Affichage de solde de congé **/
        $Exceptionnels = Cconge::select('CCONG_SOLDE_9')->where('CCONG_MAT_95', $id_user)->where('CCONG_NAT_9', 1)->get();
        $Exceptionnel=$Exceptionnels[0]->CCONG_SOLDE_9 ;

        $Recuperations = Cconge::select('CCONG_SOLDE_9')->where('CCONG_MAT_95', $id_user)->where('CCONG_NAT_9', 2)->get();
        $Recuperation = $Recuperations[0]->CCONG_SOLDE_9;

        $Annuels = Cconge::select('CCONG_SOLDE_9')->where('CCONG_MAT_95', $id_user)->where('CCONG_NAT_9', 3)->get();
        $Annuel=$Annuels[0]->CCONG_SOLDE_9;

        /**Liste des jours feries en attend**/
        $JoursFeries = JoursFeries::where('dateJoursFeries', '>', $dateNow)->get();
        return view('EmployerDashboard',compact('NombreDeJoursTrav','NombredeJoursTous','NombreAbsence','NombreConge','Accepter','Refuser','Exceptionnel','Recuperation','Annuel','JoursFeries'));
    }
    abort(404);
}

}
