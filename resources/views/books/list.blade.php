@extends('layouts.app')
@section('title') {{'All books'}} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/books/create" class="btn btn-success">Add your new book</a>

                @if (//Auth::user()->role == "Admin"//) 
                <li class="nav-item">
                      <a href="/books/create" class="btn btn-success">Add new library book</a>
                </li>
             @endif
                
                
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Authors first name</th>
                        <th scope="col">and last name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Publisher name</th>
                        <th scope="col">Publisher place</th>
                        <th scope="col">Year</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->author_fname }}</td>
                            <td>{{ $book->author_lname }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->publisher_name }}</td>
                            <td>{{ $book->publisher_place }}</td>
                            <td>{{ $book->year }}</td>
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
