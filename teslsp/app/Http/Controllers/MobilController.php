<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jumlahbaris = 5;
        $data = mobil::orderBy('id','desc')->paginate($jumlahbaris);
        return view('mobil.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('model', $request-> model);
        Session::flash('tahun', $request-> tahun);
        Session::flash('jumlahpenumpang', $request-> jumlahpenumpang);
        Session::flash('manufaktur', $request-> manufaktur);
        Session::flash('harga', $request-> harga);
        Session::flash('tipebahanbakar', $request-> tipebahanbakar);
        Session::flash('luasbagasi', $request-> luasbagasi);


        $request->validate([
            'model' => 'required',
            'tahun' => 'required|numeric',
            'jumlahpenumpang' => 'required|numeric',
            'manufaktur' => 'required',
            'harga' => 'required|numeric',
            'tipebahanbakar' => 'required',
            'luasbagasi' => 'required|numeric'

        ],
        [
            'model.required' => 'Model wajib diisi',
            'tahun.required' => 'Tahun wajib diisi',
            'tahun.numeric' => 'Tahun wajib berupa angka',
            'jumlahpenumpang.required' => 'jumlahpenumpang wajib diisi',
            'jumlahpenumpang.numeric' => 'jumlahpenumpang wajib berupa angka',
            'manufaktur.required' => 'manufaktur wajib diisi',
            'harga.required' => 'harga wajib diisi',
            'harga.numeric' => 'harga wajib berupa angka',
            'tipebahanbakar.required' => 'tipebahanbakar wajib diisi',
            'luasbagasi.required' => 'luasbagasi wajib diisi',
            'luasbagasi.numeric' => 'luasbagasi wajib berupa angka',
        ]);

        $data = [
            'model' => $request->model,
            'tahun' => $request->tahun,
            'jumlahpenumpang' => $request->jumlahpenumpang,
            'manufaktur' => $request->manufaktur,
            'harga' => $request->harga,
            'tipebahanbakar' => $request->tipebahanbakar,
            'luasbagasi' => $request->luasbagasi,
        ];

        mobil::create($data);
        return redirect()->to('mobil')->with('success','Berhasil Menambahkan Data');

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
    public function edit(string $id)
    {
        $data = mobil::where('id', $id)->first();
        return view('mobil.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'model' => 'required',
            'tahun' => 'required|numeric',
            'jumlahpenumpang' => 'required|numeric',
            'manufaktur' => 'required',
            'harga' => 'required|numeric',
            'tipebahanbakar' => 'required',
            'luasbagasi' => 'required|numeric'

        ],
        [
            'model.required' => 'Model wajib diisi',
            'tahun.required' => 'Tahun wajib diisi',
            'tahun.numeric' => 'Tahun wajib berupa angka',
            'jumlahpenumpang.required' => 'jumlahpenumpang wajib diisi',
            'jumlahpenumpang.numeric' => 'jumlahpenumpang wajib berupa angka',
            'manufaktur.required' => 'manufaktur wajib diisi',
            'harga.required' => 'harga wajib diisi',
            'harga.numeric' => 'harga wajib berupa angka',
            'tipebahanbakar.required' => 'tipebahanbakar wajib diisi',
            'luasbagasi.required' => 'luasbagasi wajib diisi',
            'luasbagasi.numeric' => 'luasbagasi wajib berupa angka',
        ]);

        $data = [
            'model' => $request->model,
            'tahun' => $request->tahun,
            'jumlahpenumpang' => $request->jumlahpenumpang,
            'manufaktur' => $request->manufaktur,
            'harga' => $request->harga,
            'tipebahanbakar' => $request->tipebahanbakar,
            'luasbagasi' => $request->luasbagasi,
        ];

        mobil::where('id', $id)->update($data);
        return redirect()->to('mobil')->with('success','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mobil::where('id', $id)->delete();
        return redirect()->to('mobil')->with('success', 'Berhasil Melakukan Delete Data');
    }
}
