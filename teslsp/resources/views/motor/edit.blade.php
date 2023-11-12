@extends('layout.template')

@section('konten')


           <!-- START FORM -->
           <form action='{{ url('motor/'.$data->id) }}' method='post'>

            @csrf
            @method('PUT')

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <a href="{{ url('motor') }}" class="btn btn-secondary">Kembali</a>

                <div class="mb-3 row">
                    <label for="model" class="col-sm-2 col-form-label">Model Kendaraan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='model' value="{{ $data->model }} " id="model">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='tahun' value="{{ $data->tahun }} " id="tahun">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="jumlahpenumpang" class="col-sm-2 col-form-label">Jumlah Penumpang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='jumlahpenumpang' value="{{ $data->jumlahpenumpang }} " id="jumlahpenumpang">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="manufaktur" class="col-sm-2 col-form-label">Manufaktur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='manufaktur' value="{{ $data->manufaktur }} " id="manufaktur">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga 'Rp'</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='harga' value="{{ $data->harga }} " id="harga">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="ukuranbagasi" class="col-sm-2 col-form-label">Ukuran Bagasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='ukuranbagasi' value="{{ $data->ukuranbagasi }} " id="ukuranbagasi">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="kapasitasbensin" class="col-sm-2 col-form-label">Kapasitas Bensin 'liter'</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='kapasitasbensin' value="{{ $data->kapasitasbensin }} " id="kapasitasbensin">
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
