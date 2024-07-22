
@extends('layouts.app')
@section('title') {{'Home'}} @endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Library statistics for </div>

                    <div class="card-body">
                        <a href="/home/365" class="btn btn-info">Last year</a>
                        <a href="/home/30" class="btn btn-info">Last month</a>
                        <a href="/home/7" class="btn btn-info">Last week</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Clients</div>

                    <div class="card-body">
                        <p>{{ $numberOfClients  }}</p>
                    </div>
                </div>
            </div>

            @if($user->role=='Admin') 
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Librarians</div>

                    <div class="card-body">
                        <p>{{ $numberOfLibrarians  }}</p>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Loans</div>

                    <div class="card-body">
                        <p>{{ $numberOfLoans  }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Books</div>

                    <div class="card-body">
                        <p>{{ $numberOfBooks  }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
