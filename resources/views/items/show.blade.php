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
                  <div class="container">
                    <h5 class="card-title">Nama : {{ $items->nama }}</h5>
                    <p class="card-text">Deskripsi : {{ $items->deskripsi }}</p>
                    <p class="card-text">Jenis : {{ $items->jenis }}</p>
                    <p class="card-text">Stok : {{ $items->stok }}</p>
                    <p class="card-text">Harga Beli : {{ $items->hargabeli }}</p>
                    <p class="card-text">Harga Jual : {{ $items->hargajual }}</p>
                  </div>
                  </body>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection