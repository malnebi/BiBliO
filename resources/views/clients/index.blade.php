
@extends('layouts.app')
@section('title') {{'Clients'}} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/clients/create" class="btn btn-success">Add new client</a>
                
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Client's name </th>
                            <th scope="col">School_role</th>
                            <th scope="col">Class</th>
                            <th scope="col">Head class teacher</th>
                            <th scope="col">School subject</th>
                            <th scope="col">e-mail</th>
                            <th scope="col">Telefon</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                        <td>{{ $client->id }}</td>
                        <td><a href="/clients/{{$client->id}}/client" class="btn btn-success"> {{ $client->first_name }}  {{ $client->last_name }}</a></td>
                        <td>{{ $client->school_role }}</td>
                        <td>{{ $client->class }}</td>
                        <td>{{ $client->head_class_teacher }}</td>
                        <td>{{ $client->school_subject }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>
               <br><br><br>

                                                     
                        </td>
                        
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection