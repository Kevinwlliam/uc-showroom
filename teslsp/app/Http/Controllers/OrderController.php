<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\main;
use App\Models\mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $jumlahbaris = 5;
        // $data = main::orderBy('id','desc')->paginate($jumlahbaris);
        // return view('/')->with('data',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = customer::all();
        $mobil = mobil::all();
        return view('order.create', compact('customer', 'mobil'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('name', $request-> customer_id);
        Session::flash('kendaraan', $request-> motor_id);
        Session::flash('jumlahharga', $request-> harga_id);

        $data = [
            'name' => $request->customer_id,
            'kendaraan' => $request->mobil_id,
            'jumlahharga' => $request->harga_id,
        ];

        main::create($data);
        return redirect()->to('/')->with('success','Berhasil Menambahkan Data');

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
        $data = main::where('id', $id)->first();
        return view('edit', [
            'customer'=> $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'kendaraan' => 'required',
            'jumlahharga' => 'required|numeric',


        ],
        [
            'name.required' => 'Nama wajib diisi',
            'kendaraan.required' => 'Kendaraan wajib diisi',
            'jumlahharga.numeric' => 'Jumlah harga wajib berupa angka',
        ]);

        $data = [
            'name' => $request->customer_id,
            'kendaraan' => $request->mobil_id,
            'jumlahharga' => $request->harga_id,
        ];

        main::where('id', $id)->update($data);
        return redirect()->to('motor')->with('success','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        main::where('id', $id)->delete();
        return redirect()->to('/')->with('success', 'Berhasil Melakukan Delete Data');
    }
}


    // public function getcustomer()
    // {
    //     $data = customer::where('nama')->paginate(10);
    //     return response()->json($data);
    // }


    // public function getkendaraan()
    // {
    //     $data = mobil::where('model')->paginate(10);
    //     $data = motor::where('model')->paginate(10);
    //     $data = truck::where('model')->paginate(10);
    //     return response()->json($data);
    // }

    // public function getharga()
    // {
    //     $data = mobil::where('harga')->paginate(10);
    //     $data = motor::where('harga')->paginate(10);
    //     $data = truck::where('harga')->paginate(10);
    //     return response()->json($data);
    // }