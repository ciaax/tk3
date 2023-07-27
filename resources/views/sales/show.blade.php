@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">{{ __('Items') }}</div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                  </head>
                  <body>
                    @if (count($sales->orders))
                    @foreach($sales->orders as $key=>$items)
                    @if(!isset($items->nama ))
                  <div class="container">
                    Item dengan id {{$items->item_id}} telah di hapus.
                  </div>
                    @endif
                    @if(isset($items->nama ))

                  <div class="container">
                    <table class="table">
                      <tr>
                        <td>Nama Barang</td>
                        <td>{{ $items->nama }}</td>
                      </tr>
                      <tr>
                        <td>Deskripsi</td>
                        <td>{{ $items->deskripsi }}</td>
                      </tr>
                      <tr>
                        <td>Jenis</td>
                        <td>{{ $items->jenis }}</td>
                      </tr>
                      <tr>
                        <td>Jumlah</td>
                        <td>{{ number_format($items->qty) }}</td>
                      </tr>
                      <tr>
                        <td>Harga Beli</td>
                        <td>Rp {{ number_format($items->hargabeli) }}</td>
                      </tr>
                      <tr>
                        <td>Harga Jual</td>
                        <td>Rp {{ number_format($items->hargajual) }}</td>
                      </tr>
                      <tr>
                        <td>Gambar</td>
                        <td><img src="{{ $items->img_path }}"/></td>
                      </tr>
                    </table>
                  </div>
                  @endif
                  @endforeach
                  @endif
                  </body>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection