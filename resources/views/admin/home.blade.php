@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-white bg-secondary">
                    <div class="card-header"><h1>{{ __('Autos') }}</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-dark">
                            <tr>
                                <th>#</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Photo</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($autos as $auto)
                                <tr>
                                    <td></td>
                                    <td>{{ $auto->make }}</td>
                                    <td>{{ $auto->model }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
