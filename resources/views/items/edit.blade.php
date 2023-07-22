@extends('home')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Student</div>
  <div class="card-body">
       
      <form action="{{ url('item/' .$items->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$items->id}}" id="id" />
        <label>Nama</label></br>
        <input type="text" name="nama" id="nama" value="{{$items->nama}}" class="form-control"></br>
        <label>Deskripsi</label></br>
        <input type="text" name="deskripsi" id="deskripsi" value="{{$items->deskripsi}}" class="form-control"></br>
        <label>Jenis</label></br>
        <input type="text" name="jenis" id="jenis" value="{{$items->jenis}}" class="form-control"></br>
        <label>Stok</label></br>
        <input type="integer" name="stok" id="stok" value="{{$items->stok}}" class="form-control"></br>
        <label>Harga Beli</label></br>
        <input type="integer" name="hargabeli" id="hargabeli" value="{{$items->hargabeli}}" class="form-control"></br>
        <label>Harga Jual</label></br>
        <input type="integer" name="hargajual" id="hargajual" value="{{$items->hargajual}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop