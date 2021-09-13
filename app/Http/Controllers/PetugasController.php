<?php

namespace App\Http\Controllers;

use App\Models\Petugas;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $petugas = Petugas::latest()->paginate(5);
         
        /// mengirimkan variabel $users ke halaman views users/index.blade.php
        /// include dengan number index
        return view('petugas.index',compact('petugas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
        ]);
        
        Petugas::create($request->all());

        return redirect()->route('petugas.index')
                            ->with('success','petugas updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('petugas.show',compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petuga)
    {
        return view('petugas.edit',compact('petuga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petuga)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
        ]);

        $petuga->update($request->all());
        
        return redirect()->route('petugas.index')
                            ->with('success','kelas updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = Petugas::findorfail($id);
        $petugas->delete();
        return redirect()->route('petugas.index')
                        ->with('success','petugas deleted successfully');
    }
}
