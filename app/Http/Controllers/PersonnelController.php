<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Personnel;
use Illuminate\Http\Request;

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
    {   if (Auth::user()->role == 'admin'){

        $personnels = Personnel::get();

        return view('personnel.index', compact('personnels'));
    }
    else
    {
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
        if (Auth::user()->role == 'admin'){

        $personnel = new Personnel();

        return view('personnel.create',compact('personnel'));
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
    {         if (Auth::user()->role == 'admin'){

        $personnels = Personnel::create($request->all());

        return redirect()->route('personnels.index')
        ->with('success','personnel created successfully.');
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
    {         if (Auth::user()->role == 'admin'){

        $personnel = Personnel::where('PERS_MAT_95',$id)->first();
        return view('personnel.show',compact('personnel'));
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
    {         if (Auth::user()->role == 'admin'){

        $personnel = Personnel::where('PERS_MAT_95',$id)->first();
        return view('personnel.edit',compact('personnel'));
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
        if (Auth::user()->role == 'admin'){

        $personnel = Personnel::where('PERS_MAT_95',$id)->first();

        $personnel->PERS_MAT_95 = $request->PERS_MAT_95;
        $personnel->PERS_NOM = $request->PERS_NOM;
        $personnel->EMAIL = $request->EMAIL;
        $personnel->PERS_SEXE_X = $request->PERS_SEXE_X;
        $personnel->PERS_DATE_NAIS = $request->PERS_DATE_NAIS;
        $personnel->PERS_NATURAGENT_93 = $request->PERS_NATURAGENT_93;

        $personnel->update();

        return redirect()->back()->with('success','Personnel Updated Successfully');
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
        if (Auth::user()->role == 'admin'){

        $personnel = Personnel::where('PERS_MAT_95',$id)->delete();

        return redirect()->route('personnels.index')
        ->with('success','personnel deleted successfully.');
    }
    else
    {
        abort(404);
    }
}
}

