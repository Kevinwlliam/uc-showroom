@extends('layout.template')

@section('konten')
    
        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('customer') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('customer/create') }}' class="btn btn-primary">+ Tambah Data</a>
                  <a href='{{ url('/') }}' class="btn btn-primary">Order</a>
                  <a href='{{ url('customer') }}' class="btn btn-primary">Data Customer</a>
                  <a href='{{ url('mobil') }}' class="btn btn-primary">Data Mobil</a>
                  <a href='{{ url('motor') }}' class="btn btn-primary">Data Motor</a>
                  <a href='{{ url('truck') }}' class="btn btn-primary">Data Truck</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-3">Alamat</th>
                            <th class="col-md-2">Nomor Telepon</th>
                            <th class="col-md-2">ID Card</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstitem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->nohp }}</td>
                            <td>{{ $item->idcard }}</td>
                            <td>
                                <a href='{{ url('customer/'.$item->idcard.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('customer/'.$item->idcard) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach

                    </tbody>
                </table>

                {{ $data->links() }}
               
          </div>
          <!-- AKHIR DATA -->
          @endsection