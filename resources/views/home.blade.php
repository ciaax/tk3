@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                        <div class="row" style="text-align: center">
                            <div class="title mb-2">
                                <h3>Manage</h3>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('item') }}" class="btn btn-primary">Items</a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-info">Staff</a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-warning">Users</a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-success">Sales</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
