<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use Illuminate\Support\Facades\Auth;
use DB ;

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
        if (Auth::user()->role == 'user'){
            $idUser=Auth::id() ;
        //$userABS =Absence::get()->where('$idUser','=','ABS_NUMORD_93');

        $userABS = DB::select("select * from absences where ABS_NUMORD_93 = '.$idUser.'");

        return view('absence.index', compact('userABS'));
        }
        else
        {
        /**Pour afficher tout les absences (Admin) **/

        $absences = Absence::get();

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
        if (Auth::user()->role == 'admin'){

        $absence = new Absence();

    return view('absence.create',compact('absence'));
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
        if (Auth::user()->role == 'admin'){

        $absences = Absence::create($request->all());

        return redirect()->route('absences.index')
        ->with('success','absence created successfully.');
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
        if (Auth::user()->role == 'admin'){

        $absence = Absence::where('ABS_MAT_95',$id)->first();

        return view('absence.show',compact('absence'));
        }
        else
        {
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
        if (Auth::user()->role == 'admin'){

        $absence = Absence::where('ABS_MAT_95',$id)->first();

        return view('absence.edit',compact('absence'));
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
        $absence = Absence::where('ABS_MAT_95',$id)->first();

        $absence->ABS_MAT_95 = $request->ABS_MAT_95;
        $absence->ABS_NUMORD_93 = $request->ABS_NUMORD_93;
        $absence->ABS_NAT_9 = $request->ABS_NAT_9;
        $absence->ABS_CET_9 = $request->ABS_CET_9;
        $absence->ABS_DATE_DEB = $request->ABS_DATE_DEB;
        $absence->ABS_PERDEB_X = $request->ABS_PERDEB_X;
        $absence->ABS_DATE_FIN = $request->ABS_DATE_FIN;
        $absence->ABS_PERFIN_X = $request->ABS_PERFIN_X;
        $absence->ABS_NBRJOUR_93 = $request->ABS_NBRJOUR_93;
        $absence->ABS_CUMULE_9 = $request->ABS_CUMULE_9;
        $absence->update();

        return redirect()->back()->with('success','absence Updated Successfully');

}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absence = Absence::where('ABS_MAT_95',$id)->delete();

        return redirect()->route('absences.index')
            ->with('success', 'Absence deleted successfully');
    }
}
