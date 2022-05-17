<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DemandeConge;
use App\Models\NatureConge;
use App\Models\Personnel;
use App\Models\Signataire;

use Illuminate\Support\Facades\Route;



use Barryvdh\DomPDF\Facade\PDF as PDF;
use DateTime;
use Illuminate\Support\Facades\Storage;

class DemandeCongeController extends Controller
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
        if (Auth::user()->role == 'admin') {

            $DemandeConge = DemandeConge::get();

            return view('DemandeConge.index', compact('DemandeConge'));
        } else {
            $idUser = Auth::user()->personnel_id;
            // dd($idUser);
            $userDemande = FacadesDB::select("select * from demande_conges where personnel_id = '$idUser'");

            return view('DemandeConge.index', compact('userDemande'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'user') {
            $DemandeConge = new DemandeConge();
            $natureCongee = FacadesDB::select("SELECT DISTINCT(NOM) FROM `nature_conges`");

            return view('DemandeConge.create', compact('DemandeConge', 'natureCongee'));
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

        $request->validate(
            [

                'date_deb' => 'required',
                'date_fin' => 'required|after:date_deb',
                'NatureDeConge' => 'required',
                'interim' => 'required',
                'fonction' => 'required',
                'direction' => 'required',
                'adresse_conge' => 'required',


            ],
            [
                'date_deb.required' => 'Le champ date debut est obligatoire.',
                'date_fin.required' => 'Le champ date fin est obligatoire.',
                'date_fin.after' => 'La date fin doit être une date postérieure à maintenant.',
                'NatureDeConge.required' => 'Le champ nature de conge est obligatoire.',
                'interim.required' => 'Le champ interim est obligatoire.',
                'fonction.required' => 'Le champ fonction est obligatoire.',
                'direction.required' => 'Le champ direction est obligatoire.',
                'adresse_conge.required' => 'Le champ adresse de conge est obligatoire.',
            ]
        );
        if (Auth::user()->role == 'user') {

            $name = Auth::user()->name;

            $phone = Auth::user()->phone;

            $idUser = Auth::user()->personnel_id;

            $DemandeConge = new DemandeConge();
            $DemandeConge->name = $name;
            $DemandeConge->date_deb = $request->date_deb;
            $DemandeConge->date_fin = $request->date_fin;
            $DemandeConge->adresse_conge = $request->adresse_conge;

            //add phone of user here --
            $DemandeConge->phone = $phone;
            $DemandeConge->NatureDeConge = $request->NatureDeConge;
            $DemandeConge->interim = $request->interim;
            $DemandeConge->fonction = $request->fonction;
            $DemandeConge->direction = $request->direction;
            $DemandeConge->personnel_id = $idUser;
            if (isset($request->date_deb, $request->date_fin)) {
                $start_time = \Carbon\Carbon::parse($request->date_deb);
                $finish_time = \Carbon\Carbon::parse($request->date_fin);

                $result = $start_time->diffInDays($finish_time, false);
            }
            $i = 0;
            $pdf = PDF::loadView('demandecongepdf', [
                'Nature_conge' => $request->NatureDeConge,
                'Matricule' => $idUser,
                'Nom_prenom' => $name,
                'Qualification' => $i++,
                'Fonction' => $request->fonction,
                'Direction' => $request->direction,
                'date_debut' => $request->date_deb,
                'date_fin' => $request->date_fin,
                'adresse_conge' => $request->adresse_conge,
                'phone' => $phone,
                'interim' => $request->interim,
                'nombre_jour' => $result,
            ]);
            $fileName = auth()->id() . '_' . time() . '.' . 'pdf';
            Storage::put('public/demandes/' . $fileName, $pdf->output());
            $DemandeConge->file = $fileName;
            $DemandeConge->save();
            /** pour afficher les nombres des jours (date fin - date debut) la difference **/


            return redirect()->route('Demandeconges.index')
                ->with('success', 'Demande créée avec succès');
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
            $DemandeConge = DemandeConge::where('id', $id)->first();
            if (isset($DemandeConge)) {
                return view('DemandeConge.show', compact('DemandeConge'));
            }
            abort(404);
        } else {
            $idUser = Auth::user()->personnel_id;
            $DemandeConge = DemandeConge::where('id', $id)->first();
            if ($DemandeConge != Null) {
                if ($idUser == $DemandeConge->personnel_id) {
                    return view('DemandeConge.show', compact('DemandeConge'));
                } else {
                    abort(404);
                }
            } else {
                abort(404);
            }
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
        if (Auth::user()->role == 'user') {

            $DemandeConge = DemandeConge::where('id', $id)->first();
            if (isset($DemandeConge)) {
                $idUser = Auth::user()->personnel_id;
                $natureCongee = FacadesDB::select("SELECT DISTINCT(NOM) FROM `nature_conges`");
                if ($idUser == $DemandeConge->personnel_id) {
                    return view('DemandeConge.edit', compact('DemandeConge', 'natureCongee'));
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

        if (Auth::user()->role == 'user') {

            $request->validate(
                [

                    'date_deb' => 'required',
                    'date_fin' => 'required|after:date_deb',
                    'NatureDeConge' => 'required',
                    'interim' => 'required',
                    'fonction' => 'required',
                    'direction' => 'required',
                    'adresse_conge' => 'required',


                ],
                [
                    'date_deb.required' => 'Le champ date debut est obligatoire.',
                    'date_fin.required' => 'Le champ date fin est obligatoire.',
                    'date_fin.after' => 'La date fin doit être une date postérieure à maintenant.',
                    'NatureDeConge.required' => 'Le champ nature de conge est obligatoire.',
                    'interim.required' => 'Le champ interim est obligatoire.',
                    'fonction.required' => 'Le champ fonction est obligatoire.',
                    'direction.required' => 'Le champ direction est obligatoire.',
                    'adresse_conge.required' => 'Le champ adresse de conge est obligatoire.',
                ]
            );




            //  $name=Auth::user()->name;
            //  $phone=Auth::user()->phone;
            //  $idUser=Auth::user()->personnel_id ;

            $DemandeConge = DemandeConge::where('id', $id)->first();

            if (
                $DemandeConge->date_deb == $request->date_deb &&  $DemandeConge->date_fin == $request->date_fin
                && $DemandeConge->NatureDeConge == $request->NatureDeConge &&  $DemandeConge->interim == $request->interim
                && $DemandeConge->fonction == $request->fonction &&  $DemandeConge->adresse_conge == $request->adresse_conge
                && $DemandeConge->adresse_conge == $request->adresse_conge
            ) {

                return redirect()->back()->with('NotModify', 'tu dois modifier au moins un champ !');
            }


            // $DemandeConge->name = $name ;
            $DemandeConge->date_deb = $request->date_deb;
            $DemandeConge->date_fin = $request->date_fin;
            $DemandeConge->adresse_conge = $request->adresse_conge;

            //add phone of user here --
            // $DemandeConge->phone = $phone ;
            $DemandeConge->NatureDeConge = $request->NatureDeConge;
            $DemandeConge->interim = $request->interim;
            $DemandeConge->fonction = $request->fonction;
            $DemandeConge->direction = $request->direction;
            // $DemandeConge->personnel_id = $idUser ;

            $DemandeConge->update();

            return redirect()->back()->with('success', 'votre demande a été modifiée avec succès.');
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
        if (Auth::user()->role == 'user') {


            $DemandeConge = DemandeConge::where('id', $id)->delete();

            return redirect()->route('Demandeconges.index')
                ->with('success', 'votre demande a été supprimer avec succès.');
        } else {
            abort(404);
        }
    }

    public function annulerDemande($annule)
    {
        if (Auth::user()->role == 'admin') {
            $DemandeConge = DemandeConge::where('id', $annule)->first();
            if (isset($DemandeConge)) {
                //dd($DemandeConge);
                $DemandeConge->statu = 'Refuser';
                $DemandeConge->save();

                return redirect()->route('Demandeconges.index')
                    ->with('success', 'la demande a été refuser avec succès.');
            }
            abort(404);
        }
        abort(404);
    }
    public function ajouterSignataire($id)
    {
            if (Auth::user()->role == 'admin') {
            $demandeur = DemandeConge::where('id', $id)->first();
            //dd($demandeur->id);
            $EMAIL_DEMANDEUR = Personnel::select('email')->where('PERS_MAT_95', $demandeur->personnel_id)->get();
            //dd($EMAIL_DEMANDEUR[0]->email);
            //dd($demandeur);
            $Emails = Personnel::select('email')->whereNotNull('PERS_CODFONC_92')->get();
            //dd($Emails);
            //dd($Emails[2]->email);
            $ListeSignataire = Signataire::where('personnel_id', $demandeur->personnel_id)->get();
            //dd($ListeSignataire);
            //dd($ListeSignataire[6]->id);
            //$ListeTypefonction=
            return view('DemandeConge.Ajoutersignataire', compact('demandeur', 'Emails', 'ListeSignataire'));
        }
        abort(404);
    }

    public function storeSignataire(Request $request, $id)
    {

        if (Auth::user()->role == "admin") {


            $request->validate(
                [
                    'emails' => 'required|array|min:1|exists:personnels,EMAIL',
                ],
                [
                    //'date_deb.required' => 'Le champ date debut est obligatoire.',
                ]
            );
            //dd($request->emails);
            $tab = $request->emails;
            //dd($tab);

            //dd($id_personnel);


            for ($i = 1; $i <= count($tab); $i++) {
                //echo(gettype($id_personnel));


                $x = $tab[$i - 1];
                //echo($x);
                // echo("<br>");
                $signataire = FacadesDB::select("select personnels.PERS_MAT_95 from personnels where personnels.EMAIL='$x' ");
                //dd($signataire[]->PERS_MAT_95 ?? null);
                $signataire_id = $signataire[0]->PERS_MAT_95;
                //dd($tab);
                // echo($signataire[0]->PERS_MAT_95);
                //var_dump($signataire[$var]->PERS_MAT_95);
                //$signataire_id=$signataire[$var]->PERS_MAT_95
                FacadesDB::insert("insert into signataires ( personnel_id , signataire_id , orderr ) values ( '$id','$signataire_id','$i')");
            }

            //dd(((int)($request->Id_personnel)));

            return redirect()->back()
                ->with('success', 'vous avez effectué une liste de signataires avec succès.');
        }
        abort(404);
    }

    public function editSignataire($id , $index)
    {

        if(Auth::user()->role=="admin"){
        $Signataire = Signataire::where('id', $id)->first();

        $Emails = Personnel::select('email')->whereNotNull('PERS_CODFONC_92')->get();
        $indexPage=$index;
        //dd($Signataire);

        return view('DemandeConge.editSign', compact('Signataire','Emails','indexPage'));
        }
        abort(404);
    }

    public function updateSignataire(Request $request, $id)
    {
        if(Auth::user()->role=="admin"){
    $idEmail= $request->email;
    //dd($idEmail);
    $idSignataire=FacadesDB::select("SELECT PERS_MAT_95 FROM personnels WHERE  EMAIL= '$idEmail'");
    //dd($idSignataire[0]->PERS_MAT_95);
    $signataire=Signataire::where('id',$id)->first();
    //dd($signataire);
    $signataire->signataire_id = $idSignataire[0]->PERS_MAT_95 ;
    $signataire->update();
    $ID=$request->Index;

    return redirect()->route("ajouterSignataire",[$ID])
    ->with("success", "vous avez modifier l'email avec succès.");
        }
        abort(404);
    }

    public function destroySignataire($id)
    {
        if (Auth::user()->role == 'admin')
        {

            $Signataire = Signataire::where('id', $id)->delete();

            return redirect()->back()
            ->with('success', 'signataire a été supprimer avec succès.');
        }
        abort(404);
    }
}
