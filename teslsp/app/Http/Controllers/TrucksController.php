<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Session;
use App\Models\truck;
use App\Models\main;

class TrucksController extends Controller
{
    public function create()
    {
        $customer = customer::all();
        $truck = truck::all();
        return view('ordertruck.create', compact('customer', 'truck'));
    }

    public function store(Request $request)
    {
        Session::flash('name', $request-> customer_id);
        Session::flash('kendaraan', $request-> truck_id);
        Session::flash('jumlahharga', $request-> harga_id);

        $data = [
            'name' => $request->customer_id,
            'kendaraan' => $request->truck_id,
            'jumlahharga' => $request->harga_id,
        ];

        main::create($data);
        return redirect()->to('/')->with('success','Berhasil Menambahkan Data');

    }
}
