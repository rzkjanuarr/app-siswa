<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index ()
    {
        return view('student.index', [
            'student' => Student::get(),
        ]);
    }

    public function create () 
    {
        return view('student.create');
    }

    public function store (Request $request) 
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
            'class' => ['required'],
            'photo' => ['image'],
        ]);

        $photo = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }

        $student = new Student();
        $student->name = $request->name;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->class = $request->class;
        $student->photo = $photo;
        $student->save();
        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('student.index');
        
    }

    public function edit ($id)
    {
        $student = Student::find($id);
        return view('student.edit', [
            'student' => $student,
        ]);
    }

    public function update (Request $request, $id) 
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
            'class' => ['required'],
        ]);

        $student = Student::find($id);
        $student->name = $request->name;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->class = $request->class;
        $student->save();
        session()->flash('perbaiki', 'Data berhasil diperbaiki');
        return redirect()->route('student.index');
        
    }

    public function destroy ($id) 
    {
        $student = Student::find($id);

        $student->delete();
        session()->flash('dihapus', 'Data berhasil dihapus');
        return redirect()->route('student.index');
    }

    
}
