
@extends('layouts.app')

@section('title') {{'Client'}} {{ $client->first_name }} {{ $client->last_name }} @endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NAME </th>
                            <th scope="col">{{ $client->first_name }} {{ $client->last_name }}</th>
                            
                            
                            <th scope="col"> Client ID </th> <td> {{ $client->id }}</td>
                            <th scope="col"></th>
                            <th>                              
                                <a href="/clients/{{$client->id}}/edit" class="btn btn-info">EDIT client data</a>
                            </th>
                            <th>   
                                <form method="POST" action="/clients/{{$client->id}}" style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" class="btn btn-danger" value="Delete client">
                                </form>
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                        <th scope="col"> School role </th><td>{{ $client->school_role }}</td>
                        <tr>
                        <th scope="col"> Class </th> <td> {{ $client->class }}</td>
                        <tr>
                        <th scope="col"> School subject </th> <td> {{ $client->school_subject }}</td>
                        <tr>
                        <th scope="col"> E-mail</th> <td> {{ $client->email }}</td>
                        <tr>
                        <th scope="col"> Phone </th> <td> {{ $client->phone }}</td>
                        
                        </tr>
                        <th scope="col">Head class teacher <td scope="col"> {{ $client->head_class_teacher }}</td></th>
                        </tr>
                    <tr>
                        <th scope="col">Number of active loans <td>{{ $numberOfLoans }}</td></th>
                    </tr>
                    <tr>
                        <th scope="col">Number of all borroved books <td>{{ $numberOfAllLoans }}</td></th>
                    </tr>
                   
                    <tr>
                    <th scope="col">Books on loan </th>  
                    @foreach($bookName as $bookNames)
                        <tr> <td>Book id: {{ $bookNames->book->id }} </td><td> {{ $bookNames->book->title }} / {{ $bookNames->book->author_fname }} {{ $bookNames->book->author_lname }}</td>   
                            @if ($numberOfLoans > 0  )
                            <td>
                                <form method="POST" action="/loans/{{$bookNames->id}}">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="col-md-8"> 
                                        <button type="submit" class="btn btn-primary">Return a book!</button>
                                    </div>
                                </form>
                            </td>
                            <td>Return deadline </td><td> {{ $bookNames->return_deadline }}  </td>   
                            <td>
                                <form method="POST" action="/loans/extend/{{$bookNames->id }}">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="col-md-8">
                                        
                                        <button type="submit" class="btn btn-primary">Extend deadline!</button>
                                        
                                    </div>
                                </form>
                            </td>
                            @endif
                        </tr>
                    
                    @endforeach
                    </tr>                           
                        <th>
                        @if($numberOfLoans <= 1)
                            <a href="/loans/create/{{$client->id}}" class="btn btn-success">BORROW a book</a>   
                        @endif
                        </th>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection