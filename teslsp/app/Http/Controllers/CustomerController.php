<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = customer::where('idcard', 'like', "%katakunci%")
                    ->orwhere('nama','like', "%katakunci%")
                    ->orwhere('alamat','like', "%katakunci%")
                    ->orwhere('nohp','like', "%katakunci%")
                    ->paginate($jumlahbaris);
        }else{
            $data = customer::orderBy('idcard','desc')->paginate($jumlahbaris);
        }
        
        return view('customer.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('idcard', $request-> idcard);
        Session::flash('nama', $request-> nama);
        Session::flash('alamat', $request-> alamat);
        Session::flash('nohp', $request-> nohp);

        $request->validate([
            'idcard' => 'required|numeric|unique:customers,idcard',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required|numeric'
        ],
        [
            'idcard.required' => 'User ID wajib diisi',
            'idcard.numeric' => 'User ID wajib berupa angka',
            'idcard.unique' => 'User ID sudah ada',
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'nohp.required' => 'No Hp wajib diisi',
            'nohp.numeric' => 'No Hp wajib berupa angka',
        ]);

        $data = [
            'idcard' => $request->idcard,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ];

        customer::create($data);
        return redirect()->to('customer')->with('success','Berhasil Menambahkan Data');

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
        $data = customer::where('idcard', $id)->first();
        return view('customer.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required|numeric'
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'nohp.required' => 'No Hp wajib diisi',
            'nohp.numeric' => 'No Hp wajib berupa angka',
        ]);

        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ];

        customer::where('idcard', $id)->update($data);
        return redirect()->to('customer')->with('success','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        customer::where('idcard', $id)->delete();
        return redirect()->to('customer')->with('success', 'Berhasil Melakukan Delete Data');
    }
}
