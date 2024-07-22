@extends('layouts.app')
@section('title') {{'Books'}} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/books/create" class="btn btn-success">ADD NEW BOOK</a>
                
                
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title / Authors name. - Publisher place: Publisher name, Year</th>
                        <th scope="col">Book status</th>
                        
                        <th scope="col">Loan to </th>
                        
                    
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($books as $book) 
                    
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td> <a href= "/books/{{$book->id}}/book" class="btn btn-success">{{ $book->title }} / {{ $book->author_fname }} {{ $book->author_lname }}. - {{ $book->publisher_place }}: {{ $book->publisher_name }}, {{ $book->year }}
                    </a></td>
                        <td>{{ $book->loan == 1 ? 'On loan' : 'Free' }}</td>
                        
                        
                    @foreach ($clients as $client)
                            @if($book->client_id==$client->id) 
                            <td>{{ $book->loan == 1 ?    $client->first_name : ''}}</td>
                            <td>{{ $book->loan == 1 ?    $client->last_name : '' }} </td>
                            @endIf
                        @endforeach
                            
                            </td>
                            <td>
                             </td>
                            
                        </tr>
                        
                        @endforeach
                        
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
