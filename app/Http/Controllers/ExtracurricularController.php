<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $eskuls= Extracurricular::with('students')->where('nama','LIKE','%' .$request->search.'%')
            ->paginate(3);
        }else {
                $eskuls = Extracurricular::with('students')->paginate(3);  
            }

        return view('eskuls.index',compact('eskuls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('eskuls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
        ]);
        $eskul = Extracurricular::create([
            'nama' => $request->nama
        ]);
        if($eskul){
            return redirect()->route('eskul.index')->with(['success' => 'Successfully Added Data Extracurriculer']);
        }else{
            return redirect()->route('eskul.update')->with('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function show(Extracurricular $extracurricular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function edit(Extracurricular $eskul)
    {

        return view('eskuls.edit',[
            'eskul' => $eskul
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Extracurricular $eskul)
    {
        $validate = $this->validate($request,[
            'nama'=>'required',
        ]);
        Extracurricular::where('id', $eskul->id)->update($validate);
        if($eskul){
            return redirect()->route('eskul.index')->with(['success' => 'Changed Successfully Data Extracurriculer']);
        }else{
            return redirect()->route('eskul.edit')->with('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extracurricular $eskul)
    {
        $eskul->delete();

        return redirect()->route('eskul.index')->with('success',"Deleted Successfully Data Extracurriculer");
    }
}
