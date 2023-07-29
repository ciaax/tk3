@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Sales Report') }}</div>

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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Stok</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Qty Penjualan</th>
                                    <th>Total Penjualan</th>
                                    <th>Laba</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_laba = 0; ?>
                                @foreach ($items as $item)
                                <?php 
                                $total_pembelian    = $item->qty_total * $item->hargabeli;
                                $total_penjualan    = $item->qty_total * $item->hargajual;
                                $laba               = $total_penjualan - $total_pembelian;
                                $total_laba         += $laba;
                                ?>
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ number_format($item->stok) }}</td>
                                        <td>Rp {{ number_format($item->hargabeli) }}</td>
                                        <td>Rp {{ number_format($item->hargajual) }}</td>
                                        <td>{{ number_format($item->qty_total) }}</td>
                                        <td>Rp {{ number_format($total_penjualan) }}</td>
                                        <td>Rp {{ number_format($laba) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th colspan="6">Total Laba</th>
                                <th>Rp {{ number_format($total_laba) }}</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection