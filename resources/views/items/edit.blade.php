@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">{{ __('Edit Item') }}</div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                  </head>
                  <body>
                  <div class="container">
                    <form action="{{ url('item/update/' .$items->id) }}" method="post">
                      {!! csrf_field() !!}
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
                  </body>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection