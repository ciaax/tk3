@extends('items.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Items</div>
  <div class="card-body">
       
      <form action="{{ url('item') }}" method="post">
        {!! csrf_field() !!}
        <label>Nama</label></br>
        <input type="text" name="nama" id="nama" class="form-control"></br>
        <label>Deskripsi</label></br>
        <input type="text" name="deskripsi" id="deskripsi" class="form-control"></br>
        <label>Jenis</label></br>
        <input type="text" name="jenis" id="jenis" class="form-control"></br>
        <label>Stok</label></br>
        <input type="integer" name="stok" id="stok" class="form-control"></br>
        <label>Harga Beli</label></br>
        <input type="integer" name="hargabeli" id="hargabeli" class="form-control"></br>
        <label>Harga Jual</label></br>
        <input type="integer" name="hargajual" id="hargajual" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop