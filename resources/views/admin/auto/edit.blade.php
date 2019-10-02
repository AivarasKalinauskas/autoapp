@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-white bg-secondary">
                    <div class="card-header"><h1>{{ __('Edit Auto') }}</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <form action="{{ route('home.update', ['auto' => $auto->id]) }}" method="post"
                              enctype="multipart/form-data">

                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="make">{{ __('Make') }}</label>
                                <input type="text" id="make" name="make"
                                       class="form-control"
                                       value="{{ old('make', $auto->make) }}">
                            </div>

                            <div class="form-group">
                                <label for="model">{{ __('Model') }}</label>
                                <input class="form-control" id="model"
                                       name="model" value="{{ old('model', $auto->model) }}">
                            </div>

                            <div class="form-group">
                                <label for="photo">{{ __('Photo') }}</label>
                                <input class="form-control-file" type="file"
                                       id="photo" name="photo" value="">
                            </div>

                            <div class="form-group d-inline-flex">
                                <input class="btn btn-outline-light"
                                       type="submit" name="submit"
                                       value="{{ __('Update') }}">
                            </div>

                            <a class="btn btn-outline-light" href="{{ route('home.index') }}">Close</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

