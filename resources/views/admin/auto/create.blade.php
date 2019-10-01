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

                        <form action="{{ route('home.store') }}" method="post"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label for="make">{{ __('Make') }}</label>
                                <input type="text" id="make" name="make"
                                       class="form-control"
                                       value="{{ old('make') }}">
                            </div>

                            <div class="form-group">
                                <label for="model">{{ __('Model') }}</label>
                                <input class="form-control" id="model"
                                          name="model" value="{{ old('model') }}">
                            </div>

                            <div class="form-group">
                                <label for="photo">{{ __('Photo') }}</label>
                                <input class="form-control-file" type="file"
                                       id="photo" name="photo" value="">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-light"
                                       type="submit" name="submit"
                                       value="{{ __('Insert') }}">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

