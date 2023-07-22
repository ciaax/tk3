@extends('items.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Items Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Nama : {{ $items->name }}</h5>
        <p class="card-text">Deskripsi : {{ $items->address }}</p>
        <p class="card-text">Jenis : {{ $items->jenis }}</p>
        <p class="card-text">Stok : {{ $items->stok }}</p>
        <p class="card-text">Harga Beli : {{ $items->hargabeli }}</p>
        <p class="card-text">Harga Jual : {{ $items->hargajual }}</p>
  </div>
    </hr>
  </div>
</div>