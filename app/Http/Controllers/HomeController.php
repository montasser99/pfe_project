<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Conge;
use App\Models\H52MvtPointageBrut;
use App\Models\JoursFeries;
use App\Models\Personnel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        if(Auth::user()->role=="admin"){
        /** les nombre maximum de homme **/
        $MaxHomme = DB::select("SELECT count(PERS_SEXE_X) as MaxHomme FROM `personnels` WHERE PERS_SEXE_X='H'");

        /** les nombre maximum de femme  **/
        $MaxFomme = DB::select("SELECT count(PERS_SEXE_X) as MaxFemme FROM `personnels` WHERE PERS_SEXE_X='F'");

        /**les employer absent **/
        $mytime = Carbon::now()->format('Y-m-d');
        //dd($mytime);
        //dd($mytime);
        $NombreAbs = 0;
        $absence = Absence::get();
        //dd($absence[0]->ABS_DATE_FIN);
        foreach ($absence as $key => $abs) {
            if ($abs->ABS_DATE_FIN > $mytime)
                $NombreAbs++;
        }
        $conge = Conge::get();
        foreach ($conge as $key => $cong) {
            if ($cong->CONG_DATE_FIN > $mytime)
                $NombreAbs++;
        }
        //$NombreAbs contient tous les employer absent


        /**les employer absent **/
        $Countpersonnel = Personnel::count();
        $present = $Countpersonnel - $NombreAbs; // variable present contient les employer present
        //dd($present , $NombreAbs);

        /**Liste des jours feries en attend**/
        $JoursFeries = JoursFeries::where('dateJoursFeries', '>', $mytime)->get();
        //dd($JoursFeries[0]->description);

        /**Pointage**/
        /**************** 1 *************/
        $premierePointageMatin = DB::select('SELECT max(pointageEntMatin) as PointageEnt ,Matricule
        FROM `h52_mvt_pointage_bruts` WHERE DATE_FORMAT(pointageEntMatin, "%Y-%m-%d")=CURDATE()
        AND pointageEntMatin=(SELECT max(pointageEntMatin)FROM h52_mvt_pointage_bruts)');
        //dd($premierePointageMatin[0]->Matricule);
        $PersonnelEntreMatin = Personnel::where('PERS_MAT_95', $premierePointageMatin[0]->Matricule)->get();
        //dd($PersonnelEntreMatin->isEmpty());
        //dd($PersonnelEntreMatin);
        //(1) nom et prenom de pointage matin
        if($PersonnelEntreMatin->isEmpty()==false){
        $NomPrenomEntreMatin = $PersonnelEntreMatin[0]->PERS_NOM . ' ' . $PersonnelEntreMatin[0]->PERS_PRENOM;}
        //dd($NomPrenomEntreMatin);
        //(1) le date maximum de pointage Entrant matin
        $dateEntreMatin = $premierePointageMatin[0]->PointageEnt;

        /*************** 2 **************/
        $dexiemePointageMatin = DB::select('SELECT min(pointageSorMatin) as pointageSort, Matricule
        FROM `h52_mvt_pointage_bruts` WHERE DATE_FORMAT(pointageSorMatin, "%Y-%m-%d")= CURDATE()
        AND pointageSorMatin=(SELECT min(pointageSorMatin) FROM h52_mvt_pointage_bruts)');
        //dd($dexiemePointageMatin[0]->Matricule);

        $PersonnelSortieMatin = Personnel::where('PERS_MAT_95', $dexiemePointageMatin[0]->Matricule)->get();

        //(2) nom et prenom de pointage matin
        if($PersonnelSortieMatin->isEmpty()==false){
        $NomPrenomSortieMatin = $PersonnelSortieMatin[0]->PERS_NOM . ' ' . $PersonnelSortieMatin[0]->PERS_PRENOM;}
        //dd($NomPrenomSortieMatin);

        //(2) le date minumum de pointage sortant matin
        $dateSorterMatin = $dexiemePointageMatin[0]->pointageSort;
        //dd($dateSorterMatin);

        /*************** 3 **************/
        $premierePointageMidi = DB::select('SELECT max(pointageEntMidi) as PointageEnt, Matricule
        FROM `h52_mvt_pointage_bruts` WHERE DATE_FORMAT(pointageEntMidi, "%Y-%m-%d")= CURDATE()
        AND pointageEntMidi=(SELECT max(pointageEntMidi)FROM h52_mvt_pointage_bruts) ');
        //dd($premierePointageMidi);
        $PersonnelEntreMidi = Personnel::where('PERS_MAT_95', $premierePointageMidi[0]->Matricule)->get();

        //(3) nom et prenom de pointage midi
        if($PersonnelEntreMidi->isEmpty()==false){
        $NomPrenomEntrerMidi = $PersonnelEntreMidi[0]->PERS_NOM . ' ' . $PersonnelEntreMidi[0]->PERS_PRENOM;}

        //(3) le date maximum de pointage entrant midi
        $dateEntrerMidi = $premierePointageMidi[0]->PointageEnt;

        /*************** 4 **************/

        $dexiemePointageMidi = DB::select('SELECT min(pointageSorMidi) as pointageSort, h52_mvt_pointage_bruts.Matricule
        FROM `h52_mvt_pointage_bruts` WHERE DATE_FORMAT(pointageSorMidi, "%Y-%m-%d")= CURDATE()
        AND pointageSorMidi=(SELECT min(pointageSorMidi) FROM h52_mvt_pointage_bruts) ');

        $PersonnelsortMidi = Personnel::where('PERS_MAT_95', $dexiemePointageMidi[0]->Matricule)->get();

        //(4) nom et prenom de pointage midi
        if($PersonnelsortMidi->isEmpty()==false){
        $NomPrenomSorterMidi = $PersonnelsortMidi[0]->PERS_NOM . ' ' . $PersonnelsortMidi[0]->PERS_PRENOM;}

        //(4) le date minimum de pointage entrant midi
        $dateSortirMidi = $dexiemePointageMidi[0]->pointageSort;


        /**************    AVG CHARTS      ****************/


        /** AVG Date Entrer Matin **/
        $Entrer_MATIN=DB::select(" SELECT CAST(AVG(pointageEntMatin) as DateTime) as pointageEntMatin  FROM `h52_mvt_pointage_bruts` WHERE date(pointageEntMatin) = date(now())");
        $AVG_Entrer_Matin=$Entrer_MATIN[0]->pointageEntMatin;

       /** AVG Date sortie Matin **/
        $Sortie_MATIN=DB::select("SELECT CAST(AVG(pointageSorMatin) as DateTime) as pointageSorMatin  FROM `h52_mvt_pointage_bruts` WHERE date(pointageSorMatin) = date(now())");
        $AVG_Sortie_Matin=$Sortie_MATIN[0]->pointageSorMatin;

        /** AVG Date Entrer Midi **/
        $Entrer_MIDI=DB::select("SELECT CAST(AVG(pointageEntMidi) as DateTime) as pointageEntMidi  FROM `h52_mvt_pointage_bruts` WHERE date(pointageEntMidi) = date(now())");
        $AVG_Entrer_Midi=$Entrer_MIDI[0]->pointageEntMidi ;

        /** AVG Date Sorter Midi **/
        $Sortie_MIDI=DB::select("SELECT CAST(AVG(pointageSorMidi) as DateTime) as pointageSorMidi  FROM `h52_mvt_pointage_bruts` WHERE date(pointageSorMidi) = date(now())");
        $AVG_Sortie_Midi=$Sortie_MIDI[0]->pointageSorMidi ;

        return view('home', compact('MaxHomme', 'MaxFomme', 'NombreAbs', 'present', 'JoursFeries', 'NomPrenomEntreMatin'

        , 'dateEntreMatin', 'NomPrenomSortieMatin', 'dateSorterMatin', 'NomPrenomEntrerMidi', 'dateEntrerMidi', 'NomPrenomSorterMidi', 'dateSortirMidi',
        'AVG_Entrer_Matin','AVG_Sortie_Matin','AVG_Entrer_Midi','AVG_Sortie_Midi'));
    }
abort(404);
}
}








/*INSERT INTO `h52_mvt_pointage_bruts` (`MvtPointageID`, `Matricule`, `pointageEntMatin`, `pointageSorMatin`, `pointageEntMidi`, `pointageSorMidi`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-06-13 08:58:22', '2022-06-13 12:00:00', '2022-06-13 14:00:22', '2022-06-13 17:20:22', '2022-06-13 14:56:30', '2022-06-13 14:56:30'),
(2, 2, '2022-06-13 08:20:22', '2022-06-13 12:06:00', '2022-06-13 14:00:22', '2022-06-13 17:20:22', '2022-06-13 14:56:30', '2022-06-13 14:56:30'),
(3, 3, '2022-06-13 08:20:22', '2022-06-13 12:35:13', '2022-06-13 14:30:22', '2022-06-13 18:00:22', '2022-06-13 14:56:30', '2022-06-13 14:56:30'),
(4, 4, '2022-06-13 08:10:22', '2022-06-13 12:10:35', '2022-06-13 14:13:22', '2022-06-13 18:06:22', '2022-06-13 14:56:30', '2022-06-13 14:56:30'),
(5, 5, '2022-06-13 08:00:00', '2022-06-13 12:04:22', '2022-06-13 14:00:22', '2022-06-13 17:30:22', '2022-06-13 14:56:30', '2022-06-13 14:56:30'),
(6, 6, '2022-06-13 09:06:22', '2022-06-13 12:01:00', '2022-06-13 14:00:10', '2022-06-13 17:50:22', '2022-06-13 14:56:30', '2022-06-13 14:56:30'),
(7, 7, '2022-06-13 08:00:22', '2022-06-13 12:04:00', '2022-06-13 14:00:01', '2022-06-13 18:00:22', '2022-06-13 14:56:30', '2022-06-13 14:56:30'),
(8, 8, '2022-06-13 08:20:00', '2022-06-13 12:00:00', '2022-06-13 14:00:06', '2022-06-13 17:40:22', '2022-06-13 14:56:30', '2022-06-13 14:56:30'),
(9, 9, '2022-06-13 08:10:22', '2022-06-13 12:00:22', '2022-06-13 14:00:22', '2022-06-13 16:06:22', '2022-06-13 14:56:30', '2022-06-13 14:56:30'),
(10, 11, '2022-06-13 08:10:22', '2022-06-13 12:00:00', '2022-06-13 15:00:22', '2022-06-13 18:00:22', '2022-06-13 14:56:30', '2022-06-13 14:56:30');*/


