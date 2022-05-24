<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conge;
use Carbon\Carbon;
use App\Models\Personnel;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Cconge;


class CongeController extends Controller
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
        /** pour afficher date now **/
        $date = Carbon::now()->format('Y-m-d');

        if (Auth::user()->role == 'admin') {
            $idAdmin = Auth::user()->personnel_id;
            $Conge = Conge::get()->whereNotIn('CONG_NUMORD_93',$idAdmin);

            /*$NameConge = FacadesDB::select(" SELECT (personnels.PERS_NOM) FROM  personnels , conges
        where personnels.PERS_MAT_95 = conges.CONG_NUMORD_93
        ORDER BY conges.CONG_MAT_95");
        */
            return view('conge.index', compact('Conge', 'date'));
        } else {
            $idUser = Auth::user()->personnel_id;
            $userConge = Conge::where('CONG_NUMORD_93', $idUser)->get();
            //dd($userConge);
            $Exceptionnel=Cconge::select('CCONG_SOLDE_9')->where('CCONG_MAT_95',$idUser)->where('CCONG_NAT_9',1)->get();
            //dd($Exceptionnel[0]->CCONG_SOLDE_9);
            $Recuperation=Cconge::select('CCONG_SOLDE_9')->where('CCONG_MAT_95',$idUser)->where('CCONG_NAT_9',2)->get();
            //dd($Recuperation[0]->CCONG_SOLDE_9);
            $Annuel=Cconge::select('CCONG_SOLDE_9')->where('CCONG_MAT_95',$idUser)->where('CCONG_NAT_9',3)->get();
            //$jj = round($Annuel[0]->CCONG_SOLDE_9, 0);
            //dd(number_format($Annuel[0]->CCONG_SOLDE_9));
            //dd(( $Annuel[0]->CCONG_SOLDE_9 ) && floor( $Annuel[0]->CCONG_SOLDE_9 ) != $Annuel[0]->CCONG_SOLDE_9);
            //$test=new Cconge();
            //$aa=25.50;
            //dd($test->is_decimal(($aa)));
            return view('conge.index', compact('userConge', 'date', 'Exceptionnel', 'Recuperation', 'Annuel'));
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
            $idAdmin = Auth::user()->personnel_id;
            $Conge = new Conge();

            $NomPers = DB::select("select distinct personnels.PERS_NOM from personnels WHERE PERS_MAT_95 != '$idAdmin'");
            $PrenomPers = DB::select("select distinct personnels.PERS_PRENOM from personnels WHERE PERS_MAT_95 != '$idAdmin'");
            $NatureConge = DB::select("SELECT DISTINCT NOM FROM `nature_conges`");
            $Email = DB::select("SELECT personnels.EMAIL FROM `personnels` WHERE PERS_MAT_95 != '$idAdmin'");

            return view('conge.create', compact('Conge', 'NomPers', 'PrenomPers', 'NatureConge', 'Email'));
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

            /** pour ajouter les clé etrangere avec table personnel  **/

            $nom = $request->NomPers;
            $prenom = $request->PrenomPers;
            $email = $request->email;


            $ID_personnel = DB::select("SELECT personnels.PERS_MAT_95 FROM personnels WHERE personnels.PERS_NOM='$nom'
            and personnels.PERS_PRENOM ='$prenom' and personnels.EMAIL='$email'");
            //dd($nom , $prenom ,$email);
            // dd($ID_personnel);

            if ($ID_personnel == false) {
                $erreur = false;

                $request->validate(
                    [
                        'NomPers' => 'required|boolean:' . $erreur,
                        'PrenomPers' => 'required|boolean:' . $erreur,
                        'email' => 'required|boolean:' . $erreur,
                        'NatureConge' => 'required',
                        'date_deb' => 'required',
                        'date_fin' => 'required|after:date_deb',
                        'interim' => 'required',
                        'adresse_conge' => 'required',
                        'phone' => 'required|numeric|digits:8',


                    ],
                    [
                        'NomPers.required' => 'Le champ nom est obligatoire.',
                        'NomPers.boolean' => 'verifier le champ prenom.',

                        'PrenomPers.required' => 'Le champ prenom pers est obligatoire.',
                        'PrenomPers.boolean' => 'verifier le champ nom.',

                        'email.boolean' => 'verifier le champ email',

                        'NatureConge.required' => 'Le champ nature de conge est obligatoire.',
                        'date_deb.required' => 'Le champ nature de conge est obligatoire.',
                        'date_fin.required' => 'Le champ date fin est obligatoire.',
                        'date_fin.after' => 'Le champ date fin doit être une date postérieure au date debut ',
                        'interim' => 'Le champ interim est obligatoire.',
                        'adresse_conge' => 'Le champ adresse de conge est obligatoire.',
                        'phone' => 'Le champ phone est obligatoire.',
                    ]
                );
            } else {
                $request->validate(
                    [
                        'NomPers' => 'required',
                        'PrenomPers' => 'required',
                        'email' => 'required',
                        'NatureConge' => 'required',
                        'date_deb' => 'required',
                        'date_fin' => 'required|after:date_deb',
                        'interim' => 'required',
                        'adresse_conge' => 'required',
                        'phone' => 'required|numeric|digits:8',


                    ],
                    [
                        'NomPers.required' => 'Le champ nom est obligatoire.',
                        'PrenomPers.required' => 'Le champ prenom pers est obligatoire.',
                        'NatureConge.required' => 'Le champ nature de conge est obligatoire.',
                        'date_deb' => 'Le champ nature de conge est obligatoire.',
                        'date_fin' => 'Le champ date fin est obligatoire.',
                        'date_fin.after' => 'Le champ date fin doit être une date postérieure au date debut ',
                        'interim' => 'Le champ interim est obligatoire.',
                        'adresse_conge' => 'Le champ adresse de conge est obligatoire.',
                        'phone' => 'Le champ phone est obligatoire.',
                    ]
                );
            }
            $PERS_MAT_95 = $ID_personnel[0]->PERS_MAT_95;
            //dd($PERS_MAT_95);



            /** pour ajouter les clé etrangere avec table nature conge  **/
            $nature = $request->NatureConge;

            $ID_nature = DB::select("SELECT nature_conges.CODE FROM nature_conges WHERE nature_conges.NOM = '$nature' ");
            $CODE_nature =  $ID_nature[0]->CODE;
            //dd($CODE_nature)

            /** pour afficher les nombres des jours (date fin - date debut) la difference **/
            if (isset($request->date_deb, $request->date_fin)) {
                $start_time = \Carbon\Carbon::parse($request->date_deb);
                $finish_time = \Carbon\Carbon::parse($request->date_fin);

                $result = $start_time->diffInDays($finish_time, false);
            }

            $Conge = new Conge();
            $Conge->CONG_NUMORD_93 = $PERS_MAT_95;
            $Conge->CONG_NAT_9 = $CODE_nature;
            $Conge->CONG_NBRJOUR_93 = $result;
            $Conge->CONG_DATE_DEB = $request->date_deb;
            $Conge->CONG_DATE_FIN = $request->date_fin;
            $Conge->CONG_INTERIM_X20 = $request->interim;
            $Conge->CONG_ADRES_X30 = $request->adresse_conge;
            $Conge->CONG_TEL_98 = $request->phone;
            $Conge->save();

            return redirect()->route('conges.index')
                ->with('success', 'conge created successfully.');
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
        if (Auth::user()->role == "admin") {
            $conge = Conge::where('CONG_MAT_95', $id)->first();
            if (isset($conge)) {
                return view('conge.show', compact('conge'));
            }
            abort(404);
        } else {
            $conge = Conge::where('CONG_MAT_95', $id)->first();
            if(isset($conge)){
            $idUser = Auth::user()->personnel_id;
            if ($idUser == $conge->CONG_NUMORD_93) {
                return view('conge.show', compact('conge'));
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

            $conge = Conge::where('CONG_MAT_95', $id)->first();
            if (isset($conge)) {
                $date = Carbon::now()->format('Y-m-d');
                /**pour afficher l'edit dans le cas de "kamel el khedma"**/
                if ($conge->CONG_DATE_FIN > $date) {

                    $NatureConge = DB::select("SELECT DISTINCT NOM FROM `nature_conges`");

                    return view('conge.edit', compact('conge', 'NatureConge'));
                }
                abort(404);
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
        $request->validate(
            [
                'NatureConge' => 'required',
                'date_deb' => 'required',
                'date_fin' => 'required|after:date_deb',
                'interim' => 'required',
                'adresse_conge' => 'required',
                'phone' => 'required|numeric|digits:8',


            ],
            [
                'date_deb' => 'Le champ nature de conge est obligatoire.',
                'date_fin' => 'Le champ date fin est obligatoire.',
                'date_fin.after' => 'Le champ date fin doit être une date postérieure au date debut ',
                'interim' => 'Le champ interim est obligatoire.',
                'adresse_conge' => 'Le champ adresse de conge est obligatoire.',
                'phone' => 'Le champ phone est obligatoire.',
            ]
        );
        if (Auth::user()->role == 'admin') {
            $Conge = Conge::where('CONG_MAT_95', $id)->first();

            /** pour afficher les nombres des jours (date fin - date debut) la difference **/
            if (isset($request->date_deb, $request->date_fin)) {
                $start_time = \Carbon\Carbon::parse($request->date_deb);
                $finish_time = \Carbon\Carbon::parse($request->date_fin);

                $result = $start_time->diffInDays($finish_time, false);
            }
            //**save request **/
            $nature = $request->NatureConge;
            //dd($nature);
            $ID_nature = DB::select("SELECT nature_conges.CODE FROM nature_conges WHERE nature_conges.NOM = '$nature' ");
            $CODE_nature =  $ID_nature[0]->CODE;

            if (($Conge->CONG_NAT_9 ==  $CODE_nature) &&  ($Conge->CONG_DATE_DEB == $request->date_deb) && ($Conge->CONG_DATE_FIN == $request->date_fin)
                && ($Conge->CONG_INTERIM_X20 == $request->interim) && ($Conge->CONG_ADRES_X30 == $request->adresse_conge) &&
                ($Conge->CONG_TEL_98 == $request->phone)
            ) {
                return redirect()->back()->with('NotModify', 'tu dois modifier au moins un champ !');
            }




            $Conge->CONG_NAT_9 =  $CODE_nature;
            $Conge->CONG_DATE_DEB = $request->date_deb;
            $Conge->CONG_DATE_FIN = $request->date_fin;
            $Conge->CONG_INTERIM_X20 = $request->interim;
            $Conge->CONG_ADRES_X30 = $request->adresse_conge;
            $Conge->CONG_NBRJOUR_93 = $result;
            $Conge->CONG_TEL_98 = $request->phone;
            $Conge->save();

            return redirect()->back()->with('success', 'conge a été modifiée avec succès.');
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
        //
    }
}
