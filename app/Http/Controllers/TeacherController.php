<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
        public function index()
    {
        return "ini adalah daftar guru";
    }

    public function show(string $id)
    {
        return "menampilkan detail guru dengan ID: {$id}";
    }

    public function create()
    {
        return "ini adalah halaman tambah guru";
    }
    

    public function edit(string $id)
    {
        return "ini adalah halaman edit guru dengan ID:{$id}";
    }

    public function store()
    {
         return "melakukan penambahan data guru baru";
    }
    
    public function update(string $id)
    {
        return "mengubah data guru dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "menghapus data guru dengan ID: {$id}";
    }
}
