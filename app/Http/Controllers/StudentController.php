<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Extracurricular;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request){
        
        if($request->has('search')){
            $students= Student::with('eskuls')->where('nama','LIKE','%' .$request->search.'%')->orWhere('jurusan','LIKE','%' .$request->search.'%')
            ->paginate(3);
        }else {
                $students = Student::with('eskuls')->paginate(3);  
            }

        return view('students.index',compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {   
        $eskuls = Extracurricular::get();
        return view('students.create',[
            'student' => $student,
            'eskuls' => $eskuls,
        ]);
    
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
            'nis'=>'required|max:10',
            'nama'=>'required',
            'umur'=>'required|integer|between:15,20',
            'jurusan' => 'required',
            'nama' => 'required',
        ]);

        $student = Student::create([
            'nis' => $request['nis'],
            'nama' =>$request['nama'],
            'umur' => $request['umur'],
            'jurusan' => $request['jurusan'],
        ]);

        $eskuls= Extracurricular::find($request->eskul_id);
        $student->eskuls()->sync($eskuls);
        
        if($student){
            return redirect()->route('student.index')->with(['success' => 'Successfully Added Data Student']);
        }else{
            return redirect()->route('student.update')->with('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $students = Student::get();
        return view('welcome',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $eskuls = Extracurricular::get();
        return view('students.edit',[
            'student' => $student,
            'eskuls' => $eskuls,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nis'=>'required|max:10',
            'nama'=>'required',
            'umur'=>'required|integer|between:15,20',
            'jurusan' => 'required',
        ]);
        
        $student->update([
            'nis' => $validated['nis'],
            'nama' =>$validated['nama'],
            'umur' => $validated['umur'],
            'jurusan' => $validated['jurusan'],
            
        ]);
      
        $eskuls= Extracurricular::find($request->eskul_id);
        $student->eskuls()->sync($eskuls);

        if($student){
            return redirect()->route('student.index')->with(['success' => 'Changed Successfully Data Student']);
        }else{
            return redirect()->route('student.edit')->with('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success',"Deleted Successfully Data Student");
    }
}
