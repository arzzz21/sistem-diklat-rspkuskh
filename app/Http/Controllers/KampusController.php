<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\MahasiswaController;

class KampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kampus = Kampus::all();
        return view('kampus.index', compact('kampus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kampus.create');
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
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'nullable'
        ]);
        Kampus::create($request->all());
        return redirect()->route('kampus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kampus  $kampus
     * @return \Illuminate\Http\Response
     */
    public function show(Kampus $kampus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kampus  $kampus
     * @return \Illuminate\Http\Response
     */
    public function edit(Kampus $kampus)
    {
        return view('kampus.edit', compact('kampus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kampus  $kampus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kampus $kampus)
    {
        $kampus->update($request->all());
        return redirect()->route('kampus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kampus  $kampus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kampus $kampus)
    {
        $kampus->delete();
        return redirect()->route('kampus.index');
    }
}
