<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceAdminController extends Controller
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
        if (Auth::user()->role == "admin") {
            $idAdmin = Auth::user()->personnel_id;
            $AdminABS =   Absence::get()->where('ABS_NUMORD_93', $idAdmin);
            //dd($AdminABS);
            return view('AdminViews.absence.index', compact('AdminABS'));
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
        if (Auth::user()->role == "admin") {
            $absence = Absence::where('ABS_MAT_95', $id)->first();
            if (isset($absence)) {
                $id_test = Auth::user()->personnel_id;
                if ($id_test == $absence->ABS_NUMORD_93) {
                    return view('AdminViews.absence.show', compact('absence'));
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
