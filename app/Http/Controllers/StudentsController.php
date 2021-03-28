<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');
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
        // return $request;

        //cara pertama
        /* $student = new Student;
        $student->nama = $request->nama;
        $student->nrp = $request->nrp;
        $student->email = $request->email;
        $student->jurusan = $request->jurusan;
        $student->save(); */

        //cara ke dua, harus menambahkan protected fillable pada model
        /*  Student::create([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ]); */

        $request->validate([
            'nama' => 'required|max:255',
            'nrp' => 'required|unique:students|max:9',
            'email' => 'required|unique:students|min:3|max:255',
            'jurusan' => 'required|max:255',
        ]);

        //cara ketiga
        Student::create($request->all());
        return redirect('/students')->with('status', 'Data <b>'.$request->nama.'</b> successful added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        // return dump($student);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        $request->validate([
            'nama' => 'required|max:255',
            'nrp' => 'required|max:9',
            'email' => 'required|min:3|max:255',
            'jurusan' => 'required|max:255',
        ]);
        if($request->nrp != $student->nrp || $request->email != $student->email){
            $request->validate([
                'nrp' => 'unique:students',
                'email' => 'unique:students'
            ]);
        }

        Student::where('id', $student->id)
            ->update([
                'nama' => $request->nama,
                'nrp' => $request->nrp,
                'email' => $request->email,
                'jurusan' => $request->jurusan
            ]);
        return redirect('/students')->with('status', 'Data <b>'.$student->nama.'</b> successful updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        //return $student;
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'Data <b>'.$student->nama.'</b> successful deleted!');
    }
}
