@extends('layout.template')

@section('konten')

<form action="{{ route('ordermotor.store') }}" method='post'>
    @csrf
<div class="container">
    <h1 class='mt-5'>Order Pesanan</h1>
    <form class='mt-2'>

        <div class='mb-2'>
            <label> User</label>
            <select name="customer_id" class="form-select" aria-label="Default select example">
                <option value="">- Pilih -</option>
                @foreach ($customer as $item)
                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class='mb-2'>
            <label> Model Kendaraan</label>
            <select name="motor_id" class="form-select" aria-label="Default select example">
                <option value="">- Pilih -</option>
                @foreach ($motor as $item)
                    <option value="{{ $item->model }}">{{ $item->model }}</option>
                @endforeach
            </select>
        </div>

        <div class='mb-2'>
            <label> Harga</label>
            <select name="harga_id" class="form-select" aria-label="Default select example">
                <option value="">- Pilih -</option>
                @foreach ($motor as $item)
                    <option value="{{ $item->harga }}">{{ $item->harga }}</option>
                @endforeach
            </select>
        </div>

    </form>

    <br>

    <div class="mb-3 row">
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Buat Pesanan</button></div>
    </div>

</div>




</form>
    

@endsection
