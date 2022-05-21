<?php

namespace App\Http\Controllers;

use App\Models\NatureConge;
use Illuminate\Support\Facades\Auth;
use App\Models\Personnel;
use App\Models\TypeFonction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB as FacadesDB;

class PersonnelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            //$personnels = Personnel::get();
            $personnels = FacadesDB::table('personnels')
                ->join('users', 'personnels.PERS_MAT_95', '=', 'users.personnel_id')
                ->join('natureagents', 'personnels.PERS_NATURAGENT_93', '=', 'natureagents.NATAG_CODE_93')
                ->join('type_fonctions', 'personnels.PERS_CODFONC_92', '=', 'type_fonctions.CODE_TYPE')
                ->get();


            return view('personnel.index', compact('personnels'));
        } else {
            abort(404);
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

            $personnel = new Personnel();
            $user = new User();
            $NatureAgent = FacadesDB::select("SELECT DISTINCT NATAG_LIB_X50 FROM `natureagents`");
            $TypeFonction = FacadesDB::select("SELECT DISTINCT LIB_TYPE FROM `type_fonctions`");

            return view('personnel.create', compact('personnel', 'user', 'NatureAgent', 'TypeFonction'));
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

        $test = time() - 18 * 31536000;
        $test = date('Y/m/d',$test);

        $request->validate(
            [
                'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg',
                'PERS_NOM' => 'required|alpha|max:15|min:3',
                'PERS_PRENOM' => 'required|alpha|max:15|min:3',
                'EMAIL' => 'required|email|unique:personnels',
                //'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'password' => 'required|min:6',
                'PERS_SEXE_X' => 'required',
                'RoleUser' => 'required',
                'PERS_DATE_NAIS' => 'required|before:'.$test,
                'PERS_NATURAGENT_93' => 'required',
                'PERS_CODFONC_92' => 'required',
                'phone' => 'required|numeric|digits:8',
            ],
            [
                'image.required' => 'Le champ image est obligatoire.',
                'PrenomPers.required' => 'Le champ prenom pers est obligatoire.',

                   /**Nom message **/
                   'PERS_NOM.required' => 'Le champ nom est obligatoire.',
                   'PERS_NOM.alpha' => 'Le champ nom doit seulement contenir des lettres.',
                   'PERS_NOM.max' => 'Le texte de nom ne peut contenir plus de 15 caractères.',
                   'PERS_NOM.min' => 'Le texte de nom ne peut contenir moin de 3 caractères.',

                 /** Prenom message **/
                 'PERS_PRENOM.required' => 'Le champ prenom est obligatoire.',
                 'PERS_PRENOM.alpha' => 'Le champ prenom doit seulement contenir des lettres.',
                 'PERS_PRENOM.max' => 'Le texte de prenom ne peut contenir plus de 15 caractères.',
                 'PERS_PRENOM.min' => 'Le texte de prenom ne peut contenir moin de 3 caractères.',

                  /**Email message **/
                  'EMAIL.required' => 'Le champ email est obligatoire.',
                  'EMAIL.email' => 'veuillez respecter le format du courriel (exemple@demaine.fr)',
                  'EMAIL.unique'=> 'La valeur du champ email est déjà utilisée.',
                  //'EMAIL.regax'=> "Nous n'acceptons pas les mails avec ce domaine",
                /**Password message **/
                'password' => 'Le champ mote de passe est obligatoire.',

                /**Sexe message **/
                    'PERS_SEXE_X.required' => 'Le champ sexe est obligatoire.',
                'RoleUser.required' => 'Le champ role est obligatoire.',

                /**Date de naissance message**/
                'PERS_DATE_NAIS.required' => 'Le champ date de naissance est obligatoire.',
                'PERS_DATE_NAIS.before' =>'Il faut avoir plus de dix-huit ans',

                'PERS_NATURAGENT_93.required' => 'Le champ nature agent est obligatoire.',
                'PERS_CODFONC_92.required' => 'Le champ type fonction est obligatoire.',
                'phone' => 'Le champ phone est obligatoire.',
            ]
        );

        if (Auth::user()->role == 'admin') {

            /**pour trouver le cle etrangere de nature agent **/
            $NatureRequest = $request->PERS_NATURAGENT_93;
            $NatureagentCle = FacadesDB::select("SELECT natureagents.NATAG_CODE_93 FROM natureagents WHERE natureagents.NATAG_LIB_X50='$NatureRequest'");
            $Nature = $NatureagentCle[0]->NATAG_CODE_93;
            //dd($Nature);

            /**pour trouver le cle etrangere de type fonction **/
            $TypeRequest = $request->PERS_CODFONC_92;
            $TypefonctionCle = FacadesDB::select("SELECT type_fonctions.CODE_TYPE FROM type_fonctions WHERE type_fonctions.LIB_TYPE='$TypeRequest'");
            $Typefonction = $TypefonctionCle[0]->CODE_TYPE;

            /** tester request sexe if Femme ou Homme par ce que sexe en base accepte caractere **/
            if ($request->PERS_SEXE_X == 'Homme') {
                $Sexe = 'H';
            } else {
                $Sexe = 'F';
            }

            /**creation d'un nouveau personnels **/
            $personnels = new Personnel;
            $personnels->PERS_NATURAGENT_93 = $Nature;
            $personnels->PERS_CODFONC_92 = $Typefonction;
            $personnels->PERS_NOM = $request->PERS_NOM;
            $personnels->PERS_PRENOM = $request->PERS_PRENOM;
            $personnels->EMAIL = $request->EMAIL;
            $personnels->PERS_SEXE_X = $Sexe;
            $personnels->PERS_DATE_NAIS = $request->PERS_DATE_NAIS;
            $personnels->PERS_TEL_98 = $request->phone;
            $personnels->save();


            /** pour connaitre le dernier id de la table **/
            // $CountIdPersonnel = DB::select("SELECT  max(`PERS_MAT_95`) FROM `personnels`");
            // dd($CountIdPersonnel);
            $max = Personnel::max('PERS_MAT_95');
            // dd($count);

            /** creation nouveau user l'ors creation d'un personnels **/
            $users = new User;
            $users->name = $request->PERS_PRENOM;
            $users->email = $request->EMAIL;
            $users->phone = $request->phone;
            $users->password = Hash::make($request->password);
            $users->role = $request->RoleUser;
            $users->personnel_id = $max;

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/Image'), $filename);
                $users['image'] = $filename;
            }
            $users->save();

            //DB::insert("insert into users (id, name,) values ('.$CountIdPersonnel.', ?)");



            return redirect()->route('personnels.index')
                ->with('success', 'personnel créé avec succès');
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

            $personnel = Personnel::where('PERS_MAT_95', $id)->first();
            if(isset($personnel)){
            return view('personnel.show', compact('personnel'));
            }
            abort(404);
        } else {
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


            $personnel = Personnel::where('PERS_MAT_95', $id)->first();
        if(isset($personnel)){
            $Nature = FacadesDB::select("SELECT DISTINCT NATAG_LIB_X50 FROM `natureagents`");
            $TypeF = FacadesDB::select("SELECT DISTINCT LIB_TYPE FROM `type_fonctions`");
            return view('personnel.edit', compact('personnel', 'Nature', 'TypeF'));
        }
        else{ abort(404); }
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

        /* pour tester l'age de personnel par anneés
        $date = Carbon::now()->format('d-m-Y'); //dd($date);
        if (isset($request->PERS_DATE_NAIS)) {
            $Date_naissance = \Carbon\Carbon::parse($request->PERS_DATE_NAIS);
            $date_now = \Carbon\Carbon::parse($date);
            $result = $Date_naissance->diffInYears($date_now, false); //dd($result);


             pour accepter les employer qui ont age > 18 ans
            if ($result < 18) {
            $bambin=true;
        }
            }


        */

        //pour tester l'age de personnel par anneés
        $test = time() - 18 * 31536000;
        $test = date('Y/m/d',$test);

            $request->validate(
                [

                    //'PERS_MAT_95' => 'required|numeric|max:5000|unique:personnels',
                    //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                    'PERS_NOM' => 'required|alpha|max:15|min:3',
                    'PERS_PRENOM' => 'required|alpha|max:15|min:3',
                    'EMAIL' => 'required|email',
                    'PERS_SEXE_X' => 'required',
                    'RoleUser' => 'required',
                    'PERS_DATE_NAIS' => 'required|before:'.$test,
                    'PERS_NATURAGENT_93' => 'required',
                    'PERS_CODFONC_92' => 'required',
                    'phone' => 'required|numeric|digits:8',
                ],
                [
                    /* image erreur message
                'image.required' => 'Le champ image est obligatoire.',
                'image.image' => 'Le champ doit etre une image.',
                'image.mimes' => 'veuillez respecter le format (jpg,png,jpeg,gif,svg).',
                */

                    /** Matricule message **/
                    //'PERS_MAT_95.required' => 'le champ matricule est obligatoire.',
                    //'PERS_MAT_95.numeric' => 'Le champ matricule doit contenir un nombre',
                    //'PERS_MAT_95.unique'=>'La valeur du champ matricule est déjà utilisée.',

                    /** Prenom message **/
                    'PERS_PRENOM.required' => 'Le champ prenom est obligatoire.',
                    'PERS_PRENOM.alpha' => 'Le champ prenom doit seulement contenir des lettres.',
                    'PERS_PRENOM.max' => 'Le texte de prenom ne peut contenir plus de 15 caractères.',
                    'PERS_PRENOM.min' => 'Le texte de prenom ne peut contenir moin de 3 caractères.',

                    /**Nom message **/
                    'PERS_NOM.required' => 'Le champ nom est obligatoire.',
                    'PERS_NOM.alpha' => 'Le champ nom doit seulement contenir des lettres.',
                    'PERS_NOM.max' => 'Le texte de nom ne peut contenir plus de 15 caractères.',
                    'PERS_NOM.min' => 'Le texte de nom ne peut contenir moin de 3 caractères.',

                    /**Email message **/
                    'EMAIL.required' => 'Le champ email est obligatoire.',
                    'EMAIL.email' => 'veuillez respecter le format du courriel (exemple@demaine.fr)',

                    /**Sexe message **/
                    'PERS_SEXE_X.required' => 'Le champ sexe est obligatoire.',


                    'RoleUser.required' => 'Le champ role est obligatoire.',

                    /**Date de naissance message**/
                    'PERS_DATE_NAIS.required' => 'Le champ date de naissance est obligatoire.',
                    'PERS_DATE_NAIS.before' =>'Il faut avoir plus de dix-huit ans',

                    'PERS_NATURAGENT_93.required' => 'Le champ nature agent est obligatoire.',
                    'PERS_CODFONC_92.required' => 'Le champ type fonction est obligatoire.',
                    'phone' => 'Le champ phone est obligatoire.',
                ]

        );





            $personnel = Personnel::where('PERS_MAT_95', $id)->first();



            /**pour trouver le cle etrangere de nature agent **/
            $NatureRequest = $request->PERS_NATURAGENT_93;
            $NatureagentCle = FacadesDB::select("SELECT natureagents.NATAG_CODE_93 FROM natureagents WHERE natureagents.NATAG_LIB_X50='$NatureRequest'");
            $Nature = $NatureagentCle[0]->NATAG_CODE_93;


            /**pour trouver le cle etrangere de type fonction **/
            $TypeRequest = $request->PERS_CODFONC_92;
            $TypefonctionCle = FacadesDB::select("SELECT type_fonctions.CODE_TYPE FROM type_fonctions WHERE type_fonctions.LIB_TYPE='$TypeRequest'");
            $Typefonction = $TypefonctionCle[0]->CODE_TYPE;



            if ($request->PERS_SEXE_X == 'Homme') {
                $Sexe = 'H';
            } else {
                $Sexe = 'F';
            }

         //tester si les variable sont meme
        if(($personnel->PERS_NOM == $request->PERS_NOM)
        &&( $personnel->PERS_PRENOM == $request->PERS_PRENOM)&&( $personnel->EMAIL == $request->EMAIL)
        &&( $personnel->PERS_SEXE_X == $Sexe)&&($personnel->users->role == $request->RoleUser)
        &&( $personnel->PERS_DATE_NAIS == $request->PERS_DATE_NAIS)
        &&( $personnel->PERS_TEL_98 == $request->phone)&&( $personnel->PERS_NATURAGENT_93 == $Nature)
        &&( $personnel->PERS_CODFONC_92 == $Typefonction)
        )
        {
            return redirect()->back()->with('NotModify', 'tu dois modifier au moins un champ !');
        }

            $personnel->PERS_MAT_95 = $id;
            $personnel->PERS_NOM = $request->PERS_NOM;
            $personnel->PERS_PRENOM = $request->PERS_PRENOM;
            $personnel->EMAIL = $request->EMAIL;
            $personnel->PERS_SEXE_X = $Sexe;
            $personnel->PERS_DATE_NAIS = $request->PERS_DATE_NAIS;
            $personnel->PERS_TEL_98 = $request->phone;
            $personnel->PERS_NATURAGENT_93 = $Nature;
            $personnel->PERS_CODFONC_92 = $Typefonction;

            $personnel->update();

            $users = User::where('personnel_id',  $personnel->PERS_MAT_95)->first();
            $users->name  = $request->PERS_NOM . ' ' . $request->PERS_PRENOM;
            $users->email = $request->EMAIL;
            $users->role  = $request->RoleUser;

            /*
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/Image'), $filename);
                $users['image'] = $filename;
            }
            */
            $users->update();



            return redirect()->back()->with('success', 'Personnel mis à jour avec succès');
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
        if (Auth::user()->role == 'admin') {

            $personnel = Personnel::where('PERS_MAT_95', $id)->delete();



            return redirect()->route('personnels.index')
                ->with('success', 'personnel a éte supprimer avec succès');
        } else {
            abort(404);
        }
    }
    public function Update_Image(Request $request, $id)
    {

        $users = User::find($id);

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $users['image'] = $filename;
        }
        $users->save();

        return redirect()->back()
            ->with('success', 'image a éte modifier avec succès');
    }
}
