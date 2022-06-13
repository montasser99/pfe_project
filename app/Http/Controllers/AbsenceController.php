<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /**Pour afficher tout les absences (User) **/
        if (Auth::user()->role == 'user') {
            $idUser = Auth::user()->personnel_id;

            //$userABS =Absence::get()->where('$idUser','=','ABS_NUMORD_93');

            //  $userABS = FacadesDB::select("SELECT * from absences where ABS_NUMORD_93 = '$idUser'");
            $userABS =   Absence::get()->where('ABS_NUMORD_93', $idUser);

            return view('absence.index', compact('userABS'));
        } else {
            /**Pour afficher tout les absences (Admin) **/
            $idAdmin = Auth::user()->personnel_id;
            $absences = Absence::get()->whereNotIn('ABS_NUMORD_93',$idAdmin);
            //dd($absences[0]->personnels->PERS_NOM);
            return view('absence.index', compact('absences'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'admin') {

            $absence = new Absence();
            $idAdmin = Auth::user()->personnel_id;
            $absenceFirstName = DB::select("SELECT DISTINCT personnels.PERS_NOM from personnels  WHERE PERS_MAT_95 != '$idAdmin'");
            $absenceLastName = DB::select("SELECT DISTINCT personnels.PERS_PRENOM from personnels  WHERE PERS_MAT_95 != '$idAdmin'");
            $ABSemail = DB::select("SELECT personnels.EMAIL from personnels WHERE PERS_MAT_95 != '$idAdmin'  ");
            $absenceNature = DB::select('SELECT DISTINCT nat_abs.LIBELLE_ABS from nat_abs');

            //dd( $ABSemail);

            return view('absence.create', compact('absence', 'absenceFirstName', 'absenceLastName', 'absenceNature', 'ABSemail'));
        } else {
            abort(404);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role == 'admin') {

            /**pour afficher le cle etrangere dans absence de personnel  **/
            $Nom = $request->PERS_NOM;
            $Prenom = $request->PERS_PRENOM;
            $Email = $request->EMAIL;
            $Personnel_cle = DB::select("SELECT personnels.PERS_MAT_95 FROM personnels WHERE personnels.PERS_NOM='$Nom'
            AND personnels.PERS_PRENOM='$Prenom' AND personnels.EMAIL='$Email' ");

            // dd($Personnel_cle);
            if ($Personnel_cle == false) {
                $erreur = false;

                $request->validate(
                    [
                        'PERS_NOM' => 'required|boolean:' . $erreur,
                        'PERS_PRENOM' => 'required|boolean:' . $erreur,
                        'EMAIL' => 'required|boolean:' . $erreur,
                        'LIBELLE_ABS' => 'required',
                        'ABS_DATE_DEB' => 'required',
                        'ABS_DATE_FIN' => 'required|after:ABS_DATE_DEB',
                        //  'ABS_CUMULE_9' => 'required',
                    ],
                    [
                        /** Prenom message **/
                        'PERS_PRENOM.required' => 'Le champ prenom est obligatoire.',
                        'PERS_PRENOM.boolean' => 'verifier le champ prenom.',
                        /**Nom message **/
                        'PERS_NOM.required' => 'Le champ nom est obligatoire.',
                        'PERS_NOM.boolean' => 'verifier le champ nom.',

                        /**Email message **/
                        'EMAIL.required' => 'Le champ email est obligatoire.',
                        'EMAIL.boolean' => 'verifier le champ email',

                        /**nature absence message **/
                        'LIBELLE_ABS.required' => 'Le champ email est obligatoire.',
                        /**date debut d'absence message **/
                        'ABS_DATE_DEB.required' => 'Le champ date debut est obligatoire.',
                        /**date fin d'absence message **/
                        'ABS_DATE_FIN.required' => 'Le champ date fin est obligatoire.',
                        'ABS_DATE_FIN.after' => 'Le champ date fin doit être une date postérieure au date debut ',
                        /**absence  d'accumulation message **/
                        // 'ABS_CUMULE_9.required' => 'Le champ absence cumulé est obligatoire.',
                    ]
                );
            } else {
                $request->validate(
                    [
                        'PERS_NOM' => 'required',
                        'PERS_PRENOM' => 'required',
                        'EMAIL' => 'required',
                        'LIBELLE_ABS' => 'required',
                        'ABS_DATE_DEB' => 'required',
                        'ABS_DATE_FIN' => 'required|after:ABS_DATE_DEB',
                        // 'ABS_CUMULE_9' => 'required',
                    ],
                    [
                        /** Prenom message **/
                        'PERS_PRENOM.required' => 'Le champ prenom est obligatoire.',
                        /**Nom message **/
                        'PERS_NOM.required' => 'Le champ nom est obligatoire.',

                        /**Email message **/
                        'EMAIL.required' => 'Le champ email est obligatoire.',

                        /**nature absence message **/
                        'LIBELLE_ABS.required' => 'Le champ email est obligatoire.',
                        /**date debut d'absence message **/
                        'ABS_DATE_DEB.required' => 'Le champ date debut est obligatoire.',
                        /**date fin d'absence message **/
                        'ABS_DATE_FIN.required' => 'Le champ date fin est obligatoire.',
                        'ABS_DATE_FIN.after' => 'Le champ date fin doit être une date postérieure au date debut ',
                        /**absence  d'accumulation message **/
                        //  'ABS_CUMULE_9.required' => 'Le champ absence cumulé est obligatoire.',
                    ]
                );
            }

            $personnel_absence = $Personnel_cle[0]->PERS_MAT_95;
            //dd($personnel_absence);

            /**pour tester si le personne est absent ou non**/
            $absence=absence::where('ABS_NUMORD_93',$personnel_absence)->get();
            $s=0;
            $Nowtime = Carbon::now()->format('Y-m-d');
            foreach($absence as $abs){
                if($abs->ABS_DATE_FIN >$Nowtime )
                $s=$s+1;

            }
            if($s>0){
                return redirect()->back()->with('existeAbs','Cette personne est déjà absente'); }
                //dd($s);


            //solution pour absence cumulé
            $OLD_absence_cumule = DB::select("SELECT absences.ABS_CUMULE_9 FROM `absences` WHERE ABS_NUMORD_93='$personnel_absence' ORDER BY ABS_CUMULE_9 DESC");
            $old = $OLD_absence_cumule[0]->ABS_CUMULE_9 + 1;
            // dd($old);



            /**pour afficher le cle etrangere dans absence de nature absence  **/
            $Nature = $request->LIBELLE_ABS;
            $natureABS_cle = DB::select("SELECT nat_abs.CODE_ABS FROM nat_abs WHERE nat_abs.LIBELLE_ABS='$Nature'");
            $nature_absence = $natureABS_cle[0]->CODE_ABS;
            //dd($nature_absence);

            if (isset($request->ABS_DATE_DEB, $request->ABS_DATE_FIN)) {
                $start_time = \Carbon\Carbon::parse($request->ABS_DATE_DEB);
                $finish_time = \Carbon\Carbon::parse($request->ABS_DATE_FIN);

                $nbrjours = $start_time->diffInDays($finish_time, false);
            }
            $absences = new Absence;

            $absences->ABS_NUMORD_93 =  $personnel_absence;
            $absences->ABS_NAT_9     =  $nature_absence;
            $absences->ABS_DATE_DEB  =  $request->ABS_DATE_DEB;
            $absences->ABS_PERDEB_X  =  $request->ABS_PERDEB_X;
            $absences->ABS_DATE_FIN  =  $request->ABS_DATE_FIN;
            $absences->ABS_PERFIN_X  =  $request->ABS_PERFIN_X;
            $absences->ABS_CUMULE_9  =  $old;
            $absences->ABS_NBRJOUR_93 = $nbrjours;
            $absences->save();

            return redirect()->route('absences.index')
                ->with('success', 'absence créé avec succès');
        } else {
            abort(404);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->role == 'admin') {

            $absence = Absence::where('ABS_MAT_95', $id)->first();
            if (isset($absence)) {
                return view('absence.show', compact('absence'));
            }
            abort(404);
        } else {
            $absence = Absence::where('ABS_MAT_95', $id)->first();
            if ($absence != null) {
                $id_test = Auth::user()->personnel_id;
                if ($id_test == $absence->ABS_NUMORD_93) {
                    return view('absence.show', compact('absence'));
                }
                abort(404);
            }
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role == 'admin') {

            $absence = Absence::where('ABS_MAT_95', $id)->first();
            if (isset($absence)) {
                $absenceNature = DB::select('SELECT DISTINCT nat_abs.LIBELLE_ABS from nat_abs');


                return view('absence.edit', compact('absence', 'absenceNature'));
            }
            abort(404);
        } else {
            abort(404);
        }
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
        if (Auth::user()->role == 'admin') {

            $request->validate(
                [
                    'ABS_DATE_DEB' => 'required',
                    'ABS_DATE_FIN' => 'required|after:ABS_DATE_DEB',
                    'ABS_CUMULE_9' => 'required',
                ],
                [
                    /**date debut d'absence message **/
                    'ABS_DATE_DEB.required' => 'Le champ date debut est obligatoire.',
                    /**date fin d'absence message **/
                    'ABS_DATE_FIN.required' => 'Le champ date fin est obligatoire.',
                    'ABS_DATE_FIN.after' => 'Le champ date fin doit être une date postérieure au date debut ',
                    /**absence  d'accumulation message **/
                    'ABS_CUMULE_9.required' => 'Le champ absence cumulé est obligatoire.',
                ]
            );

            /**pour afficher le cle etrangere dans absence de nature absence  **/
            $Nature = $request->LIBELLE_ABS;
            $natureABS_cle = DB::select("SELECT nat_abs.CODE_ABS FROM nat_abs WHERE nat_abs.LIBELLE_ABS='$Nature'");
            $nature_absence = $natureABS_cle[0]->CODE_ABS;
            //dd($nature_absence);

            /** pour trouver le nombre de jours **/
            if (isset($request->ABS_DATE_DEB, $request->ABS_DATE_FIN)) {
                $start_time = \Carbon\Carbon::parse($request->ABS_DATE_DEB);
                $finish_time = \Carbon\Carbon::parse($request->ABS_DATE_FIN);

                $nbrjours = $start_time->diffInDays($finish_time, false);
            }


            $absence = Absence::where('ABS_MAT_95', $id)->first();

            if (($absence->ABS_NAT_9 == $nature_absence) &&  ($absence->ABS_DATE_DEB == $request->ABS_DATE_DEB) && ($absence->ABS_PERDEB_X == $request->ABS_PERDEB_X)
                && ($absence->ABS_DATE_FIN == $request->ABS_DATE_FIN) &&  ($absence->ABS_PERFIN_X == $request->ABS_PERFIN_X) &&
                ($absence->ABS_CUMULE_9 == $request->ABS_CUMULE_9)
            ) {
                return redirect()->back()->with('NotModify', 'tu dois modifier au moins un champ !');
            }

            $absence->ABS_NAT_9 = $nature_absence;
            $absence->ABS_DATE_DEB = $request->ABS_DATE_DEB;
            $absence->ABS_PERDEB_X = $request->ABS_PERDEB_X;
            $absence->ABS_DATE_FIN = $request->ABS_DATE_FIN;
            $absence->ABS_PERFIN_X = $request->ABS_PERFIN_X;
            $absence->ABS_CUMULE_9 = $request->ABS_CUMULE_9;
            $absence->ABS_NBRJOUR_93 = $nbrjours;
            $absence->update();

            return redirect()->back()->with('success', 'absence mis à jour avec succès');
        } else {
            abort(404);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absence = Absence::where('ABS_MAT_95', $id)->first();
        //dd($absence);
        $absence->delete();

        return redirect()->route('absences.index')
            ->with('success', 'absence a éte supprimer avec succès');
    }
}
