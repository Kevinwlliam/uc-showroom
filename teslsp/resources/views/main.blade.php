@extends('layout.template')

@section('konten')
    
        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="pb-3">
                  <a href='{{ url('buttonorder') }}' class="btn btn-primary">+ Tambah Orderan</a>
                  <a href='{{ url('customer') }}' class="btn btn-primary">Data Customer</a>
                  <a href='{{ url('mobil') }}' class="btn btn-primary">Data Mobil</a>
                  <a href='{{ url('motor') }}' class="btn btn-primary">Data Motor</a>
                  <a href='{{ url('truck') }}' class="btn btn-primary">Data Truck</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Customer</th>
                            <th class="col-md-2">Jenis Kendaraan</th>
                            <th class="col-md-2">Total Harga</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mains as $main)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $main->name }}</td>
                            <td>{{ $main->kendaraan }}</td>
                            <td>{{ $main->jumlahharga }}</td>
                            <td>
                                {{-- <a href="{{ route('order.edit', $main->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('order/'.$main->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Customer</th>
                            <th class="col-md-2">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($totals as $main)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $main->name }}</td>
                            <td>{{ $main->total_harga }}</td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>

        
          </div>
          <!-- AKHIR DATA -->
          @endsection