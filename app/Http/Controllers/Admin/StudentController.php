<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student; // ✅ Tambahkan ini

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data dari model Student
        $students = Student::all();

        // Kirim data ke view
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'nisn' => 'required|unique:students',
        ]);

        Student::create($request->all());
        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
 public function edit($id)
{
    $student = Student::findOrFail($id);
    return view('admin.students.edit', compact('student'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis,' . $id,
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'nisn' => 'required|unique:students,nisn,' . $id,
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('admin.students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
