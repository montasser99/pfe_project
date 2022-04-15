<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\H52MvtPointageBrut;
use Illuminate\Http\Request;
use DB;
class PointageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     /**Pour afficher tout les pointages (User) **/
     if (Auth::user()->role == 'user'){
        $idUser=Auth::id() ;


    $userPOINT = DB::select("select * from h52_mvt_pointage_bruts where MATRICULE = '.$idUser.'");

    return view('pointage.index', compact('userPOINT'));
    }
    else
    {
        /**Pour afficher tout les absences (Admin) **/

        $pointages = H52MvtPointageBrut::get();

        return view('pointage.index', compact('pointages'));
    }
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
        //
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
