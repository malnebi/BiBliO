
@extends('layouts.app')
@section('title') {{$book->title}}/{{ $book->author_fname }}{{ $book->author_lname }} @endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">   {{ $book->title }}  </th>                            
                            <th scope="col">{{ $book->author_lname }}, {{ $book->author_fname }} </th>                    
                        </tr>   
                    </thead>
                    <tbody>
                        <tr>                             
                            <td>*********************** </td> <td>***************************************** </td><td>*************************************** </td>
                             
                    </tr>

                        <tr>
                        <th scope="col"> Book ID </th><td>{{ $book->id }}</td>
                            </tr>
                        <tr>
                            <th scope="col"> AUTHOR: </th><td>{{ $book->author_fname }} {{ $book->author_lname }}</td>
                            </tr>
                        <tr>
                            <th scope="col"> TITLE:</th><td>  {{ $book->title }}</td>
                            </tr>
                        <tr>
                            <th scope="col"> PUBLISHER NAME: </th><td>  {{ $book->publisher_name }}</td>
                        </tr>
                        <tr>
                            <th scope="col"> PUBLISHER PLACE:</th><td>{{ $book->publisher_place }}</td>
                                </tr>
                                   <tr>
                                    <th scope="col"> YEAR: </th><td>{{ $book->year }}</td>
                                    </tr>
                                            <tr>
                                            <th>BOOK STATUS: </th><td>{{ $book->loan == 1 ? 'On loan' : 'Free for loan' }}</td>
                                            </tr>
                                            <tr>
                                            <th scope="col"> Catalogization In Publication </th>
                                           <td> {{ $book->title }} / {{ $book->author_fname }} {{ $book->author_lname }}. - {{ $book->publisher_place }}: {{ $book->publisher_name }}, {{ $book->year }} </td>
                                           
                                            <th><a href="/books/{{$book->id}}/edit" class="btn btn-info">EDIT BOOK DATA</a> </th>
                    <tr>
                        <th scope="col">Number of loans <td>{{ $numberOfLoans }}</td></th>
                    </tr>
                   
                    <tr>
                    <th scope="col">Clients</th>  
                    @foreach($clientName as $clientNames)
                        <tr> 
                            <td>Client: {{ $clientNames->client->id }} </td>
                            <td> {{ $clientNames->client->first_name }} {{ $clientNames->client->last_name}} </td> 
                            <td> {{ $clientNames->created_at}}</td>
                            <td> {{ $clientNames->updated_at}}</td>  </tr>
                    @endforeach
                    </tr>        

                            
                    </tbody>
                </table>






            </div>
        </div>
    </div>
@endsection