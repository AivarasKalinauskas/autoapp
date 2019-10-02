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


                        @foreach($autos as $auto)
                            <div class="card text-dark mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-5">
                                        @if($auto->photo)
                                            <img class="card-img"
                                                 src="{{ asset('storage/'.$auto->photo) }}"
                                                 alt="{{ $auto->make . " " . $auto->model }}">
                                        @endif
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $auto->make . " " . $auto->model }}</h5>
                                            <div class="container py-3">
                                                <table>
                                                    <tr>
                                                        <td>Year:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Engine capacity:
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fuel type:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gearbox:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Driving wheels:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Body type:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Color:</td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="container py-3">
                                                <a class="btn btn-sm btn-outline-primary d-inline-block"
                                                   href="{{ route('home.edit', ['auto' => $auto->id]) }}">Edit</a>
                                                <a class="btn btn-sm btn-outline-success d-inline-bloc"
                                                   href="{{ route('home.show', ['auto' => $auto->id]) }}">Show</a>
                                                <form
                                                    class="d-inline-flex"
                                                    action="{{ route('home.destroy', ['auto' => $auto->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input
                                                        type="submit"
                                                        onclick="return confirm('Are you sure?');"
                                                        class="btn btn-sm btn-outline-danger"
                                                        name="deleteAuto"
                                                        value="Delete">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
