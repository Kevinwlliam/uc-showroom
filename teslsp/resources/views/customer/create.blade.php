@extends('layout.template')

@section('konten')


           <!-- START FORM -->
           <form action='{{ url('customer') }}' method='post'>

            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <a href="{{ url('customer') }}" class="btn btn-secondary">Kembali</a>
                <div class="mb-3 row">
                    <label for="idcard" class="col-sm-2 col-form-label">ID Card</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='idcard' value="{{ Session::get('idcard') }} " id="idcard">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }} " id="nama">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='alamat' value="{{ Session::get('alamat') }} " id="alamat">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nohp" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nohp' value="{{ Session::get('nohp') }} " id="nohp">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                </div>
                
              </form>
            </div>
            <!-- AKHIR FORM -->

            @endsection
