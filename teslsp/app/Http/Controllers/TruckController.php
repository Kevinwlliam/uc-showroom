<?php

namespace App\Http\Controllers;

use App\Models\truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jumlahbaris = 5;
        $data = truck::orderBy('id','desc')->paginate($jumlahbaris);
        return view('truck.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('truck.create');
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
        Session::flash('jumlahrodaban', $request-> jumlahrodaban);
        Session::flash('luasareakargo', $request-> luasareakargo);

        $request->validate([
            'model' => 'required',
            'tahun' => 'required|numeric',
            'jumlahpenumpang' => 'required|numeric',
            'manufaktur' => 'required',
            'harga' => 'required|numeric',
            'jumlahrodaban' => 'required|numeric',
            'luasareakargo' => 'required|numeric'

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
            'jumlahrodaban.required' => 'jumlahrodaban wajib diisi',
            'jumlahrodaban.numeric' => 'jumlahrodaban wajib berupa angka',
            'luasareakargo.required' => 'luasareakargo wajib diisi',
            'luasareakargo.numeric' => 'luasareakargo wajib berupa angka',
        ]);

        $data = [
            'model' => $request->model,
            'tahun' => $request->tahun,
            'jumlahpenumpang' => $request->jumlahpenumpang,
            'manufaktur' => $request->manufaktur,
            'harga' => $request->harga,
            'jumlahrodaban' => $request->jumlahrodaban,
            'luasareakargo' => $request->luasareakargo,
        ];

        truck::create($data);
        return redirect()->to('truck')->with('success','Berhasil Menambahkan Data');

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
        $data = truck::where('id', $id)->first();
        return view('truck.edit')->with('data', $data);
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
            'jumlahrodaban' => 'required|numeric',
            'luasareakargo' => 'required|numeric'

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
            'jumlahrodaban.required' => 'jumlahrodaban wajib diisi',
            'jumlahrodaban.numeric' => 'jumlahrodaban wajib berupa angka',
            'luasareakargo.required' => 'luasareakargo wajib diisi',
            'luasareakargo.numeric' => 'luasareakargo wajib berupa angka',
        ]);

        $data = [
            'model' => $request->model,
            'tahun' => $request->tahun,
            'jumlahpenumpang' => $request->jumlahpenumpang,
            'manufaktur' => $request->manufaktur,
            'harga' => $request->harga,
            'jumlahrodaban' => $request->jumlahrodaban,
            'luasareakargo' => $request->luasareakargo,
        ];

        truck::where('id', $id)->update($data);
        return redirect()->to('truck')->with('success','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        truck::where('id', $id)->delete();
        return redirect()->to('truck')->with('success', 'Berhasil Melakukan Delete Data');
    }
}
