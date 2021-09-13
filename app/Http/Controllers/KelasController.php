<?php

namespace App\Http\Controllers;

use App\Models\Kela;

use Illuminate\Http\Request;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $kelas = Kela::latest()->paginate(5);
         
        /// mengirimkan variabel $users ke halaman views users/index.blade.php
        /// include dengan number index
        return view('kelas.index',compact('kelas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
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
            'namakelas' => 'required',
            'walikelas' => 'required',
        ]);
        
        Kela::create($request->all());

        return redirect()->route('kelas.index')
                            ->with('success','kelas updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('kelas.show',compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kela $kela)
    {
        return view('kelas.edit',compact('kela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kela $kela)
    {
        $request->validate([
            'namakelas' => 'required',
            'walikelas' => 'required',
        ]);

        $kela->update($request->all());
        
        return redirect()->route('kelas.index')
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
        $kelas = Kela::findorfail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')
                        ->with('success','kelas deleted successfully');
    }
}
