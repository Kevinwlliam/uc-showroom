@extends('layout.template')

@section('konten')


           <!-- START FORM -->
           <form action='{{ url('mobil') }}' method='post'>

            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <a href="{{ url('mobil') }}" class="btn btn-secondary">Kembali</a>
                <div class="mb-3 row">
                    <label for="model" class="col-sm-2 col-form-label">Model Kendaraan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='model' value="{{ Session::get('model') }} " id="model">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='tahun' value="{{ Session::get('tahun') }} " id="tahun">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="jumlahpenumpang" class="col-sm-2 col-form-label">Jumlah Penumpang</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='jumlahpenumpang' value="{{ Session::get('jumlahpenumpang') }} " id="jumlahpenumpang">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="manufaktur" class="col-sm-2 col-form-label">Manufaktur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='manufaktur' value="{{ Session::get('manufaktur') }} " id="manufaktur">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='harga' value="{{ Session::get('harga') }} " id="harga">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tipebahanbakar" class="col-sm-2 col-form-label">Tipe Bahan Bakar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='tipebahanbakar' value="{{ Session::get('tipebahanbakar') }} " id="tipebahanbakar">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="luasbagasi" class="col-sm-2 col-form-label">Luas Bagasi</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='luasbagasi' value="{{ Session::get('luasbagasi') }} " id="luasbagasi">
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
