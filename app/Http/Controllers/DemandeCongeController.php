<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DemandeConge;
use App\Models\NatureConge;
use DB;

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
        if(Auth::user()->role=='admin'){

     $DemandeConge = DemandeConge::get();

     return view('DemandeConge.index', compact('DemandeConge'));
    }
    else {
        $idUser=Auth::id() ;
        $userDemande = DB::select("select * from demande_conges where personnel_id = '.$idUser.'");

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
        if(Auth::user()->role=='user'){
            $DemandeConge = new DemandeConge();
        $natureCongee = DB::select("SELECT DISTINCT(NOM) FROM `nature_conges`");

        return view('DemandeConge.create',compact('DemandeConge','natureCongee'));

    }
    else
    {
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
        if(Auth::user()->role=='user'){

        $name=Auth::user()->name;

        $phone=Auth::user()->phone;

        $idUser=Auth::id() ;
        $DemandeConge = new DemandeConge();
        $DemandeConge->name = $name ;
        $DemandeConge->date_deb = $request->date_deb ;
        $DemandeConge->date_fin = $request->date_fin ;
        $DemandeConge->adresse_conge = $request->adresse_conge ;

        //add phone of user here --
        $DemandeConge->phone = $phone ;
        $DemandeConge->NatureDeConge = $request->NatureDeConge ;
        $DemandeConge->interim = $request->interim ;
        $DemandeConge->fonction = $request->fonction ;
        $DemandeConge->direction = $request->direction ;
        $DemandeConge->personnel_id = $idUser ;

        $DemandeConge->save();

        return redirect()->route('Demandeconges.index')
        ->with('success','demande created successfully.');

        }
        else
        {
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
        $DemandeConge = DemandeConge::where('id',$id)->first();
        return view('DemandeConge.show',compact('DemandeConge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role=='user'){

        $DemandeConge = DemandeConge::where('id',$id)->first();
        $natureCongee = DB::select("SELECT DISTINCT(NOM) FROM `nature_conges`");

        return view('DemandeConge.edit',compact('DemandeConge','natureCongee'));

        }
    else
    {
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

        if(Auth::user()->role=='user'){

        $name=Auth::user()->name;
        $phone=Auth::user()->phone;
        $idUser=Auth::id() ;

        $DemandeConge = DemandeConge::where('id',$id)->first();

        $DemandeConge->name = $name ;
        $DemandeConge->date_deb = $request->date_deb ;
        $DemandeConge->date_fin = $request->date_fin ;
        $DemandeConge->adresse_conge = $request->adresse_conge ;

        //add phone of user here --
        $DemandeConge->phone = $phone ;
        $DemandeConge->NatureDeConge = $request->NatureDeConge ;
        $DemandeConge->interim = $request->interim ;
        $DemandeConge->fonction = $request->fonction ;
        $DemandeConge->direction = $request->direction ;
        $DemandeConge->personnel_id = $idUser ;

        $DemandeConge->update();

        return redirect()->back()->with('success','votre demande Updated Successfully');
        }

        else
        {
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
        if(Auth::user()->role=='user'){


        $DemandeConge = DemandeConge::where('id',$id)->delete();

        return redirect()->route('Demandeconges.index')
        ->with('success','personnel deleted successfully.');
    }

    else
    {
        abort(404);
    }

}

}
