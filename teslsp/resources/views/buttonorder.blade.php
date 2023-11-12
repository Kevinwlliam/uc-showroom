@extends('layout.template')

@section('konten')

<div class="container">
    <h1 class='mt-5'>Pilih Jenis Kendaraan Yang Mau Di Order</h1>

    <br>

    <a href='{{ url('order/create') }}' class="btn btn-primary">Mobil</a>

    <a href='{{ url('ordermotor/create') }}' class="btn btn-primary">Motor</a>

    <a href='{{ url('ordertruck/create') }}' class="btn btn-primary">Truck</a>

</div>

    

@endsection
