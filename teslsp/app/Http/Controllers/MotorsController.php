<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\main;
use App\Models\motor;
use Illuminate\Support\Facades\Session;

class MotorsController extends Controller
{

    public function create()
    {
        $customer = customer::all();
        $motor = motor::all();
        return view('ordermotor.create', compact('customer', 'motor'));
    }

    public function store(Request $request)
    {
        Session::flash('name', $request-> customer_id);
        Session::flash('kendaraan', $request-> motor_id);
        Session::flash('jumlahharga', $request-> harga_id);

        $data = [
            'name' => $request->customer_id,
            'kendaraan' => $request->motor_id,
            'jumlahharga' => $request->harga_id,
        ];

        main::create($data);
        return redirect()->to('/')->with('success','Berhasil Menambahkan Data');

    }
}
