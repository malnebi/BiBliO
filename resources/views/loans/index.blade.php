@extends('layouts.app')
@section('title') {{'All loans'}} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-right">
            <div class="col-md-8">
                <table class="table">
                    <thead>

                        <tr> <h3> List of all loans </h3>
                        </tr>


                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Client</th>
                        <th scope="col">Book</th>
                        <th scope="col">Return deadline</th>
                        <th scope="col">Activ loan</th>                        
                        <th scope="col">Librarian</th>  
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($loans as $loan)
                        <tr>
                            <td>{{ $loan->id }}</td>
                            <td>{{ $loan->client->first_name }} {{ $loan->client->last_name }}</td>
                            <td>{{ $loan->book->title }} / {{ $loan->book->author_fname }} {{ $loan->book->author_lname }}</td>
                            <td>{{ $loan->return_deadline }}</td>
                            <td>{{ $loan->active }}</td>
                            <td>{{ $loan->user->name }}</td>
                            
                            @if ($loan->active == 1  ) 
                                <td> BOOK IS  </td>  <td> ON  LOAN! </td>
                            @endif
                            
                            @if ($loan->active == 0) 
                                <td> Book is returned on</td> <td> {{$loan->updated_at}}</td>  
  
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
