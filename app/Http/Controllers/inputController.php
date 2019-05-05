<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\perpustakaan;

class inputController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpustakaan = perpustakaan::all();
        return view('input.index', compact('perpustakaan'));   //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('input.create'); //
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
            'judul'=>'required',
            'penerbit'=> 'required',
            'tahun_terbit' => 'required|integer',
            'pengarang' => 'required'
          ]);
          $perpustakaan = new perpustakaan([
            'judul' => $request->get('judul'),
            'penerbit'=> $request->get('penerbit'),
            'tahun_terbit'=> $request->get('tahun_terbit'),
            'pengarang' => $request->get('pengarang')
          ]);
          $perpustakaan->save();
          return redirect('/perpustakaan')->with('success', 'Stock has been added'); //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perpustakaan = perpustakaan::find($id);
        return view('input.edit', compact('perpustakaan'));  //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'=>'required',
            'penerbit'=> 'required',
            'tahun_terbit' => 'required|integer',
            'pengarang' => 'required'
          ]);
    
          $perpustakaan = perpustakaan::find($id);
          $perpustakaan->judul = $request->get('judul');
          $perpustakaan->penerbit = $request->get('penerbit');
          $perpustakaan->tahun_terbit = $request->get('tahun_terbit');
          $perpustakaan->pengarang = $request->get('pengarang');
          $perpustakaan->save();
    
          return redirect('/perpustakaan')->with('success', 'Stock has been updated');  //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perpustakaan = perpustakaan::find($id);
        $perpustakaan->delete();
   
        return redirect('/perpustakaan')->with('success', 'Stock has been deleted Successfully'); //
    }//
}
