@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Automibiliai</div>

                <div class="container">
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
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
