<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "ini adalah daftar jurusan";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "ini adalah halaman tambah jurusan";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "melakukan penambahan data jurusan baru";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "menampilkan detail jurusan dengan ID: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "ini adalah halaman edit jurusan dengan ID:{$id}";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "mengubah data jurusan dengan ID: {$id}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "menghapus data jurusan dengan ID: {$id}";
    }
}
