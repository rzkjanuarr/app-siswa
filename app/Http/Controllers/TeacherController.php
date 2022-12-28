<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index ()
    {
        return view('teacher.index', [
            'teacher' => Teacher::get(),
        ]);
    }

    public function create () 
    {
        return view('teacher.create');
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

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->address = $request->address;
        $teacher->phone_number = $request->phone_number;
        $teacher->class = $request->class;
        $teacher->photo = $photo;
        $teacher->save();
        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('teacher.index');
        
    }

    public function edit ($id)
    {
        $teacher = Teacher::find($id);
        return view('teacher.edit', [
            'teacher' => $teacher,
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

        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->address = $request->address;
        $teacher->phone_number = $request->phone_number;
        $teacher->class = $request->class;
        $teacher->save();
        session()->flash('perbaiki', 'Data berhasil diperbaiki');
        return redirect()->route('teacher.index');
        
    }

    public function destroy ($id) 
    {
        $teacher = Teacher::find($id);

        $teacher->delete();
        session()->flash('dihapus', 'Data berhasil dihapus');
        return redirect()->route('teacher.index');
    }
}
