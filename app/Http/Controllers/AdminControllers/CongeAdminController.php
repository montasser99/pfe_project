<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Cconge;
use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CongeAdminController extends Controller
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
        if (Auth::user()->role=="admin"){
        $idAdmin = Auth::user()->personnel_id;

        $AdminConge = Conge::where('CONG_NUMORD_93', $idAdmin)->get();
        //dd($userConge);
        $Exceptionnel=Cconge::select('CCONG_SOLDE_9')->where('CCONG_MAT_95',$idAdmin)->where('CCONG_NAT_9',1)->get();
        $Recuperation=Cconge::select('CCONG_SOLDE_9')->where('CCONG_MAT_95',$idAdmin)->where('CCONG_NAT_9',2)->get();
        $Annuel=Cconge::select('CCONG_SOLDE_9')->where('CCONG_MAT_95',$idAdmin)->where('CCONG_NAT_9',3)->get();
        return view('AdminViews.conge.index', compact('AdminConge','Exceptionnel', 'Recuperation', 'Annuel'));
    }
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conge = Conge::where('CONG_MAT_95', $id)->first();
        //dd($conge->CONG_NUMORD_93);
        if(isset($conge)){
        $idUser = Auth::user()->personnel_id;
        if ($idUser == $conge->CONG_NUMORD_93) {
            return view('conge.show', compact('conge'));
        }
         abort(404);
    }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
