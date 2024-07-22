@extends('layouts.app')
@section('title') {{'New loan'}} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Create loan for {{ $client->first_name }} {{ $client->last_name }}</h3>
               
               

                <form method="POST" action="/loans">
                    @csrf
                    <input type="hidden" name="client_id" value="{{$client->id}}">
                    
                    <input type="hidden" name="user_id" value="{{$user = Auth::user()->id}}">
                         
                    <div class="form-group">
                        <label >Book</label>
                        <select class="form-control" name="book_id">
                            @foreach($books as $book)
                            <option value="{{ $book->id }}" selected>{{ $book->id }} {{$book->title}} <p>/</p> {{ $book->author_fname }} {{ $book->author_lname }}</option>
                            @endforeach
                        </select> 
                    </div>
                <button type="submit" class="btn btn-primary">Loan the book for 30 days</button>
                </form>
                <br><br><br>
                <h>Loan by librarian {{ Auth::user()->name }}</h>
                        
            </div>
        </div>
    </div>
@endsection