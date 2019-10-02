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

                            <div class="form-group">
                                <h3>{{ $auto->make }}</h3>
                            </div>

                            <div class="form-group">
                                <h3>{{ $auto->model }}</h3>
                            </div>

                            <div class="form-group">
                                <img width="300px" src="{{ asset('storage/'.$auto->photo) }}"
                                     alt="{{ $auto->make . " " . $auto->model }}">
                            </div>

                            <form action="{{ route('home.index') }}">
                                <input class="btn btn-outline-light" type="submit" value="Close">
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

