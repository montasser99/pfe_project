<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use Illuminate\Support\Facades\Auth;

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
        $absences = Absence::get();

        return view('absence.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $absence = new Absence();

    return view('absence.create',compact('absence'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $absences = Absence::create($request->all());

        return redirect()->route('absences.index')
        ->with('success','absence created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absence = Absence::where('ABS_MAT_95',$id)->first();

        return view('absence.show',compact('absence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absence = Absence::where('ABS_MAT_95',$id)->first();

        return view('absence.edit',compact('absence'));
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

        $absence->ABS_MAT_95 = $request->input('ABS_MAT_95');
        $absence->ABS_NUMORD_93 = $request->input('ABS_NUMORD_93');
        $absence->ABS_NAT_9 = $request->input('ABS_NAT_9');
        $absence->ABS_CET_9 = $request->input('ABS_CET_9');
        $absence->ABS_DATE_DEB = $request->input('ABS_DATE_DEB');
        $absence->ABS_PERDEB_X = $request->input('ABS_PERDEB_X');
        $absence->ABS_DATE_FIN = $request->input('ABS_DATE_FIN');
        $absence->ABS_PERFIN_X = $request->input('ABS_PERFIN_X');
        $absence->ABS_NBRJOUR_93 = $request->input('ABS_NBRJOUR_93');
        $absence->ABS_CUMULE_9 = $request->input('ABS_CUMULE_9');
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
