<?php

namespace App\Http\Controllers;

use App\Models\motor;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jumlahbaris = 5;
        $data = motor::orderBy('id','desc')->paginate($jumlahbaris);
        return view('motor.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('motor.create');
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
        Session::flash('ukuranbagasi', $request-> ukuranbagasi);
        Session::flash('kapasitasbensin', $request-> kapasitasbensin);

        $request->validate([
            'model' => 'required',
            'tahun' => 'required|numeric',
            'jumlahpenumpang' => 'required|numeric',
            'manufaktur' => 'required',
            'harga' => 'required|numeric',
            'ukuranbagasi' => 'required|numeric',
            'kapasitasbensin' => 'required|numeric'

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
            'ukuranbagasi.required' => 'ukuranbagasi wajib diisi',
            'ukuranbagasi.numeric' => 'ukuranbagasi wajib berupa angka',
            'kapasitasbensin.required' => 'kapasitasbensin wajib diisi',
            'kapasitasbensin.numeric' => 'kapasitasbensin wajib berupa angka',
        ]);

        $data = [
            'model' => $request->model,
            'tahun' => $request->tahun,
            'jumlahpenumpang' => $request->jumlahpenumpang,
            'manufaktur' => $request->manufaktur,
            'harga' => $request->harga,
            'ukuranbagasi' => $request->ukuranbagasi,
            'kapasitasbensin' => $request->kapasitasbensin,
        ];

        motor::create($data);
        return redirect()->to('motor')->with('success','Berhasil Menambahkan Data');

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
        $data = motor::where('id', $id)->first();
        return view('motor.edit')->with('data', $data);
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
            'ukuranbagasi' => 'required|numeric',
            'kapasitasbensin' => 'required|numeric'

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
            'ukuranbagasi.required' => 'ukuranbagasi wajib diisi',
            'ukuranbagasi.numeric' => 'ukuranbagasi wajib berupa angka',
            'kapasitasbensin.required' => 'kapasitasbensin wajib diisi',
            'kapasitasbensin.numeric' => 'kapasitasbensin wajib berupa angka',
        ]);

        $data = [
            'model' => $request->model,
            'tahun' => $request->tahun,
            'jumlahpenumpang' => $request->jumlahpenumpang,
            'manufaktur' => $request->manufaktur,
            'harga' => $request->harga,
            'ukuranbagasi' => $request->ukuranbagasi,
            'kapasitasbensin' => $request->kapasitasbensin,
        ];

        motor::where('id', $id)->update($data);
        return redirect()->to('motor')->with('success','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        motor::where('id', $id)->delete();
        return redirect()->to('motor')->with('success', 'Berhasil Melakukan Delete Data');
    }
}
